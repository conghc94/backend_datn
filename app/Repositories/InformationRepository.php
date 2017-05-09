<?php

namespace App\Repositories;

use App\Models\Information;
use InfyOm\Generator\Common\BaseRepository;

class InformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'server_id',
        'sql_server_utilization',
        'system_idle_process',
        'other_process_cpu',
        'total_physical_memory',
        'available_physical_memory'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Information::class;
    }
}
