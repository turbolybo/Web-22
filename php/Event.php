<?php

use Illuminate\Database\Eloquent\Model;
require_once 'vendor/autoload.php';

class Event extends Model
{
    protected $fillable = ['id', 'title', 'description', 'pris', 'img_url', 'date'];
    protected $dates = ['date'];

}