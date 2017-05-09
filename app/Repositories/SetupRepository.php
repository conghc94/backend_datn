<?php

namespace App\Repositories;

use App\Models\Setup;
use InfyOm\Generator\Common\BaseRepository;

class SetupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sql_server_utilization',
        'system_idle_process',
        'other_process_cpu',
        'available_physical_memory'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Setup::class;
    }
}
