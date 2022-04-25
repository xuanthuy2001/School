<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Models\Course;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get("q");
        $data = Course::query()
            ->where('name', 'like', '%' . $search . '%')
            ->paginate(2)
            ->appends(['q' => $search]);
        return view('course.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(StoreRequest $request)
    {

        // $object = new Course();
        // $object->fill($request->except(['_token']));
        // $object->save();
        Course::create($request->validated());
        return redirect()->route('courses.index');
    }





    public function edit(Course $course)
    {
        return view('course.edit', [
            'each' => $course,
        ]);
    }


    public function update(Request $request, Course $course)
    {
        $course->update($request->except([
            '_token',
            'method',
        ]));
        return redirect()->route('courses.index');
    }


    public function destroy(DestroyRequest $request, $course)
    {
        Course::destroy($course);
        return redirect()->route('courses.index');
    }
}