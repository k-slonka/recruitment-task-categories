<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Translations\CategoryTranslation;
use App\Events\AddCategory;

class CategoryController extends Controller
{
    /**
     * Get all categories
     */
    public function index(Request $request)
    {
        \App::setlocale($request->header('Locale'));
        return response()->json(Category::get())->setStatusCode(200);
    }

    /**
     * Create new category
     */
    //TODO -- add request
    public function store(Request $request)
    {
        $category = Category::create();
        $categoryTranslation = new CategoryTranslation;
        $categoryTranslation->category_id = $category->id;
        $categoryTranslation->name = $request->name;
        $categoryTranslation->locale = $request->header('Locale');
        $categoryTranslation->save();

        event(new AddCategory($category));

        return response("A new category has been added.", 201);
    }
}
