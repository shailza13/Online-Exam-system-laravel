<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oex_portals extends Model
{
    use HasFactory;
    protected $table='oex_portals';
    protected $primaryKey='id';
    protected $fillable=['name','email','mobile_no','password','status'];
}
