<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subcategory extends Model
{

    protected $fillable = [
        'title', 'description'
    ];

    public $timestamps = false;

}
