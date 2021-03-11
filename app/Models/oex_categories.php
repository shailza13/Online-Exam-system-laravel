<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oex_categories extends Model
{
    use HasFactory;
    protected $table='oex_categories';
    protected $primaryKey='id';
    protected $fillable=['name','status'];
}
