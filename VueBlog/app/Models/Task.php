<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'time_start',
        'time_end',
        'timer',
        'discription',
        'property',
        'status',
        'namber',
        'user_id',
    ];
    public function target(){
        return $this->newBelongsToMany(Target::class);
    }

    cons
}
