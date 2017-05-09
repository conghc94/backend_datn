<?php

namespace App\Models;
use App\Models\Role;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends EntrustPermission
{
    use SoftDeletes;

    protected $table = "permission";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:permissions,name',
        'display_name' => 'required|size:18',
        'description' => 'required'
    ];
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','permission_role','role_id','permission_id')->withTimestamps();
    }

}