<?php

namespace App\Models;

use App\Models\Destination;
use Eloquent as Model;

/**
 * Class Agenda
 * @package App\Models
 * @version May 8, 2017, 4:28 pm UTC
 */
class Agenda extends Model
{

    public $table = 'agendas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'destination_id',
        'agenda_at',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'destination_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'destination_id' => 'integer',
        'agenda_at' => 'date|required',
        'name' => 'string|max:255|required'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
