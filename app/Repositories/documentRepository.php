<?php

namespace App\Repositories;

use App\Models\Document;
use InfyOm\Generator\Common\BaseRepository;

class documentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'file_name',
        'type',
        'size',
        'view_count',
        'dowload_count',
        'tags',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return document::class;
    }
}
