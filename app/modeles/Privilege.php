<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    //
    protected $table = 'privilege';
    protected $primarykey = 'idPrivilege';
    public $incrementing = true;
    public $timestamp = true;
}
