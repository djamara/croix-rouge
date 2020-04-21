<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model {

    //
    protected $table = 'diplome';
    protected $primarykey = 'iddiplome';
    public $incrementing = true;
    public $timestamp = false;

}
