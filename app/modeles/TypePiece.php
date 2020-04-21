<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;

class TypePiece extends Model
{
    //
    protected $table = 'typepiece';
    protected $primarykey = 'idTypePiece';
    public $incrementing = true;
    public $timestamp = false;
}
