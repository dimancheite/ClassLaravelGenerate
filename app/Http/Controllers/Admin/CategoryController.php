<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Utilities\Files;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends AdminController
{



	public function __construct() {
		parent::__construct();
	}

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
	{
        die('Category index');
    }
}
