<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Server
 * @package App\Models
 * @version April 10, 2017, 3:07 am UTC
 */
class Server extends Model
{
    use SoftDeletes;

    public $table = 'servers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'mac_address',
        'customer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'mac_address' => 'string',
        'customer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'mac_address' => 'required|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
        'key' => 'required'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }

    public function information(){
        return $this->hasMany('App\Models\Information')->orderBy('created_at', 'desc');
    }
}
