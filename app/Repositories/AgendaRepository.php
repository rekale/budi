<?php

namespace App\Repositories;

use App\Models\Agenda;
use InfyOm\Generator\Common\BaseRepository;

class AgendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'destination_id',
        'agenda_at',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agenda::class;
    }
}
