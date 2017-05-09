<?php

namespace App\Repositories;

use App\Models\CustomerKey;
use InfyOm\Generator\Common\BaseRepository;

class CustomerKeyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'key'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomerKey::class;
    }
}
