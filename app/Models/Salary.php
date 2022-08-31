<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = ['salary'];
    protected $hidden = ['created_at','updated_at'];

    public function positions()
    {
        return $this->hasMany(Position::class, 'salary_id');
    }
}
