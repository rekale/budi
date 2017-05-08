<?php

namespace App\Models;

use App\Models\Destination;
use Eloquent as Model;

/**
 * Class Participant
 * @package App\Models
 * @version May 8, 2017, 5:12 pm UTC
 */
class Participant extends Model
{

    public $table = 'participants';



    public $fillable = [
        'destination_id',
        'name',
        'email',
        'phone',
        'position'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'destination_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'position' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'destination_id' => 'integer|required',
        'name' => 'string|max:30|required',
        'email' => 'email|required|string|max:255',
        'phone' => 'numeric|required',
        'position' => 'string|required|max:255'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
