<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomerKey
 * @package App\Models
 * @version April 7, 2017, 7:50 am UTC
 */
class CustomerKey extends Model
{
    use SoftDeletes;

    public $table = 'customer_keys';

    protected $primaryKey = 'customer_id';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customer_id',
        'key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_id' => 'integer',
        'key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required'
    ];

    
}
