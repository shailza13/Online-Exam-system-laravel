<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oex_exam_masters extends Model
{
    use HasFactory;
    protected $table='oex_exam_masters';
    protected $primaryKey='id';
    protected $fillable=['title','category','exam_date','status'];
}
