<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Destination
 * @package App\Models
 * @version April 30, 2017, 3:06 pm UTC
 */
class Destination extends Model
{

    public $table = 'destinations';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'abstract',
        'body',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'abstract' => 'string',
        'body' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:15',
        'abstract' => 'required|max:255',
        'body' => 'required|max:10000',
        'image' => 'required|image|max:1000'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $updateRules = [
        'title' => 'required|max:15',
        'abstract' => 'required|max:255',
        'body' => 'required|max:10000',
        'image' => 'image|max:1000'
    ];


}
