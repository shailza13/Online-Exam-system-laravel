<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oex_results extends Model
{
    use HasFactory;
    protected $table='oex_results';
    protected $primaryKey='id';
    protected $fillable=['exam_id','user_id','yes_ans','no_ans','result_json'];
}
