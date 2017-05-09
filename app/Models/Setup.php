<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setup
 * @package App\Models
 * @version April 18, 2017, 8:24 am UTC
 */
class Setup extends Model
{
    use SoftDeletes;

    public $table = 'setups';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'sql_server_utilization',
        'system_idle_process',
        'other_process_cpu',
        'available_physical_memory'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'sql_server_utilization' => 'integer',
        'system_idle_process' => 'integer',
        'other_process_cpu' => 'integer',
        'available_physical_memory' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sql_server_utilization' => 'required|integer|min:0|max:100',
        'system_idle_process' => 'required|integer|min:0|max:100',
        'other_process_cpu' => 'required|integer|min:0|max:100',
        'available_physical_memory' => 'required|integer|min:0|max:100'
    ];

    
}
