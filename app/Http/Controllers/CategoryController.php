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

    public function getAllCategory()
    {  
        return $this->categoryClient->getAllCategory();
    }
    public function getCategoryById(string $id)
    {
        return $this->categoryClient->getCategoryById($id);
    }
}


  