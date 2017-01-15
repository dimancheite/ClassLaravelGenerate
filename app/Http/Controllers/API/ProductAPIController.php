<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Response;

class ProductAPIController extends APIController
{
	/** @var ProductRepository */
	private $productRepository;



	/**
	 * @param ProductRepository $productRepository
	 */
    public function __construct(ProductRepository $productRepository)
	{
        parent::__construct();
		$this->productRepository = $productRepository;
    }

	/**
	 * @return Response
	 */
	public function index() {
		$queryProducts = Product::all();
		$products = [];
		foreach ($queryProducts as $product) {
			$products[] = [
				'id' => $product->id,
				'name' => $product->name,
				'unit_price' => $product->unit_price,
				'quantity' => $product->quantity,
				'image' => asset('/') . $product->image
			];
		}
		return $this->sendResponse($products, 'Product list');
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request) {
		if ($request->has('name') && $request->has('unit_price') && $request->has('quantity')) {
			$newProduct = $this->productRepository->create($request->all());
			$this->sendResponse($newProduct, 'Product was created successfully.');
		} else {
			return $this->sendError('Missing parameters', 400);
		}
	}

	/**
	 * @param $id
	 * @param Request $request
	 * @return Response
	 */
	public function update($id, Request $request) {
		$product = $this->productRepository->findWithoutFail($id);
		if (empty($product)) {
			return $this->sendError('Product is not found.', 400);
		}
		$product = $this->productRepository->update($request->all(), $id);
		return $this->sendResponse($product, 'Product was updated successfully.');
	}

	/**
	 * @param $id
	 * @param Request $request
	 * @return Response
	 */
	public function delete($id, Request $request) {
		$product = $this->productRepository->findWithoutFail($id);
		if (empty($product)) {
			return $this->sendError('Product is not found.', 400);
		}
		$this->productRepository->delete($id);
		return $this->sendResponse(null, 'Product was deleted successfully.');
	}
}
