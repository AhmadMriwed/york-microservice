<?php

namespace App\Http\Controllers;

use App\Http\Clients\CategoryClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Courses\CategoryRequest;
use App\Http\Requests\Courses\UpdateCategoryRequest;
use App\Http\Resources\Courses\CategoryResource;
use App\Models\Courses\Category;
use App\Traits\Media;

use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{

    private $categoryClient;
    public function __construct()
    {
        $this->categoryClient = new CategoryClient();

    }
    /**
     * @OA\Get(
     *     path="/category",
     *     summary="Get all categories",
     *     description="Retrieve a list of all categories",
     *     operationId="getAllCategories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of categories retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */

    public function getAllCategory()
    {
        return $this->categoryClient->getAllCategory();
    }

    /**
     * @OA\Get(
     *     path="/category/{id}",
     *     summary="Get category by ID",
     *     description="Retrieve details of a specific category by its ID",
     *     operationId="getCategoryById",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(type="string", example="1")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category details retrieved successfully",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found",
     *     )
     * )
     */
    public function getCategoryById(string $id)
    {
        return $this->categoryClient->getCategoryById($id);
    }
}


