<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class CategPermis extends Model
{
    //
    protected $table = 'categoriepermis';
    protected $primarykey = 'idCategorie';
    public $incrementing = true;
    public $timestamp = false;
}
