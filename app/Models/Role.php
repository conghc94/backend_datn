<?php

namespace App\Models;
use App\Models\User;
use App\Models\Permission;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;

    protected $table = "role";

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
    
    public function users()
    {
        return $this->belongsToMany('App\Models\User','role_user','user_id','role_id')->withTimestamps();
    }
    
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id')->withTimestamps();
    }
}