<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class personneCategPermis extends Model
{
    //
    protected $table = 'personne_categoriepermis';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
