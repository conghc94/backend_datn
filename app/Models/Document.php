<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class document
 * @package App\Models
 * @version April 22, 2017, 9:24 am UTC
 */
class Document extends Model
{
    use SoftDeletes;

    public $table = 'documents';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'category_id',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'type' => 'string',
        'view_count' => 'integer',
        'dowload_count' => 'integer',
        'tags' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'user_id' => 'required',
        'category_id' => 'required',
        'title' => 'required',
        'description' => 'required',
//        'type' => 'required|mimes:pdf,doc,ppt,pptx,docx,',//
//        'size' => 'required',
//        'status' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    
}
