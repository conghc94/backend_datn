<?php

namespace App\Repositories;

use App\Models\Server;
use InfyOm\Generator\Common\BaseRepository;

class ServerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'mac_address',
        'customer_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Server::class;
    }
}
