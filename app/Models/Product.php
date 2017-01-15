<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version December 27, 2016, 8:32 am UTC
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'unit_price',
        'quantity',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'id' => 'string',
        'name' => 'string',
        'unit_price' => 'double',
		'quantity' => 'numeric',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|max:35',
        'unit_price' => 'required|numeric',
        'quantity' => 'required|numeric'
    ];

    public static function getPrefixImageName() {
		return date('Y_m_d');
	}

	public static function getImageBasePath() {
		return 'uploads';
	}
}
