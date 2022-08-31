<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['salary_id', 'name'];

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }
}
