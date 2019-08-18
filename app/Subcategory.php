<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subcategory extends Model
{

    use Notifiable;

    protected $fillable = [
        'title', 'description'
    ];

    public $timestamps = false;

}
