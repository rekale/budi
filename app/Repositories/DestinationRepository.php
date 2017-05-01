<?php

namespace App\Repositories;

use App\Models\Destination;
use InfyOm\Generator\Common\BaseRepository;

class DestinationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'abstract',
        'body',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Destination::class;
    }
}
