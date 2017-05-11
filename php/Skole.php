<?php

use Illuminate\Database\Eloquent\Model;
require_once 'vendor/autoload.php';

class Skole extends Model
{
    protected $fillable = ['id', 'navn', 'adresse', 'bilde'];


    public function arrangementer()
    {
        return $this->hasMany('Arrangement','skoleId','id');
    }

}