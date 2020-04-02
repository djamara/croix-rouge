<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    //
    protected $table = "ville";
    protected $primarykey = 'idville';
    public $incrementing = true;
    public $timestamp = false;
}
