<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Student
 * @package App\Models
 * @version December 25, 2016, 3:46 am UTC
 */
class Student extends Model
{
    use SoftDeletes;

    public $table = 'students';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'sex',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'id' => 'string',
        'name' => 'string',
        'sex' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|max:35',
        'sex' => 'required|max:1'
    ];
    
}
