<?php

namespace App\Models;

use App\Traits\IdTrait;
use Eloquent as Model;

/**
 * Class File
 * @package App\Models
 * @version December 29, 2016, 8:38 am UTC
 */
class File extends Model
{
    use IdTrait;

    public $table = 'files';
	public $timestamps = false;


    public $fillable = [
        'original_name',
        'filename'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'id' => 'string',
        'original_name' => 'string',
        'filename' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'original_name' => 'required',
//        'filename' => 'required'
    ];

	public static function getPrefixFile() {
		return date('Y_m_d');
	}

	public static function getFileBasePath() {
		return 'uploads';
	}

	public function getFileType() {
		$fileType = 'image';
		if (strpos($this->original_name, '.pdf') !== false) {
			$fileType = 'pdf';
		}

		return $fileType;
	}
}
