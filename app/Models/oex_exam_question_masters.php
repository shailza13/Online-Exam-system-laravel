<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oex_exam_question_masters extends Model
{
    use HasFactory;
    protected $table='oex_exam_question_masters';
    protected $primaryKey="id";
    protected $fillable=['exam_id','question','ans','options','status'];
}
