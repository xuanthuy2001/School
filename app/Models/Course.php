<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable   = ['name'];

    public function getYearCreatedAtAttribute()
    {

        return $this->created_at->format('d/m/Y');
        // return date_format(date_create($this->created_at), 'Y');
    }
}