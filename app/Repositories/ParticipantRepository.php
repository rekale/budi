<?php

namespace App\Repositories;

use App\Models\Participant;
use InfyOm\Generator\Common\BaseRepository;

class ParticipantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'destination_id',
        'name',
        'email',
        'phone',
        'position'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Participant::class;
    }
}
