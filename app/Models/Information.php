<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Information
 * @package App\Models
 * @version April 7, 2017, 4:18 am UTC
 */
class Information extends Model
{
    use SoftDeletes;

    public $table = 'information';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'server_id',
        'sql_server_utilization',
        'system_idle_process',
        'other_process_cpu',
        'total_physical_memory',
        'available_physical_memory'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'server_id' => 'integer',
        'sql_server_utilization' => 'integer',
        'system_idle_process' => 'integer',
        'other_process_cpu' => 'integer',
        'total_physical_memory' => 'integer',
        'available_physical_memory' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mac_address' => 'required|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
        'sql_server_utilization' => 'required|numeric|min:0|max:100',
        'system_idle_process' => 'required|numeric|min:0|max:100',
        'other_process_cpu' => 'required|numeric|min:0|max:100',
        'total_physical_memory' => 'required|numeric|min:0',
        'available_physical_memory' => 'required|numeric|min:0'
    ];


}