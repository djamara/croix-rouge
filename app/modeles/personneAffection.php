<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class personneAffection extends Model
{
    //
    protected $table = 'personne_affection';
    protected $primarykey = 'idaffection';
    public $incrementing = true;
    public $timestamp = false;
}
