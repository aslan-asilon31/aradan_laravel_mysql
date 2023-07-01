<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

/**
 * @OA\Info(
 *    title="APIs For Aradan Server by AslanAsilon",
 *    version="1.0.0",
 *    description = "
 *         ![aradan_mysql1](https://github.com/aslan-asilon31/aradan_laravel_mysql/assets/116990574/47af96f9-94f6-4187-bd73-617b945479ca)
 *   "
 * ),
 * @OA\Get(
 *    path="/api/product",
 *    summary="Get all products",
 *    description="Retrieve a list of all products",
 *    tags={"Product"},
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *      @OA\JsonContent(
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Product")
 *      ),
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Get(
 *    path="/api/product/{id}",
 *    summary="Get a product by ID",
 *    description="Retrieve a specific product by its ID",
 *    tags={"Product"},
 *    @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of the product",
 *      required=true,
 *      @OA\Schema(type="integer", format="int64")
 *    ),
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Post(
 *    path="/api/product",
 *    summary="Create a new product",
 *    description="Create a new product",
 *    tags={"Product"},
 *    @OA\RequestBody(
 *      required=true,
 *      @OA\JsonContent(ref="#/components/schemas/ProductRequest")
 *    ),
 *    @OA\Response(
 *      response=201,
 *      description="Product created successfully",
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Put(
 *    path="/api/product/{id}",
 *    summary="Update a product",
 *    description="Update an existing product by its ID",
 *    tags={"Product"},
 *    @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of the product",
 *      required=true,
 *      @OA\Schema(type="integer", format="int64")
 *    ),
 *    @OA\RequestBody(
 *      required=true,
 *      @OA\JsonContent(ref="#/components/schemas/ProductRequest")
 *    ),
 *    @OA\Response(
 *      response=200,
 *      description="Product updated successfully",
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Delete(
 *    path="/api/product/{id}",
 *    summary="Delete a product",
 *    description="Delete a product by its ID",
 *    tags={"Product"},
 *    @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of the product",
 *      required=true,
 *      @OA\Schema(type="integer", format="int64")
 *    ),
 *    @OA\Response(
 *      response=204,
 *      description="Product deleted successfully"
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Schema(
 *    schema="Product",
 *    type="object",
 *    @OA\Property(property="id", type="integer", format="int64"),
 *    @OA\Property(property="name", type="string"),
 *    @OA\Property(property="description", type="string"),
 *    @OA\Property(property="price", type="number", format="float")
 * ),
 * @OA\Schema(
 *    schema="ProductRequest",
 *    type="object",
 *    @OA\Property(property="name", type="string"),
 *    @OA\Property(property="description", type="string"),
 *    @OA\Property(property="price", type="number", format="float")
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
*/


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        
        return response()->json(['products' => $products]);
    }
}
