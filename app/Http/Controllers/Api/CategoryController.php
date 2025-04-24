<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;


class CategoryController extends Controller
{

    // get all categories
    public function categories(Request $request) {
        $all = Category::with(['tasks' => function($query) {
            $query->orderBy('rank');
        }])->get();

        return response()->json($all, 200);
    }

    
    // add new category
    public function create(Request $request) {

        /* Validation */
        $validator = Validator::make($request->all(), [
            'slug' => 'required|string',
            'name' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        Category::create([
            "name" => $request->name
        ]);

        return response()->json(["message"], 200);
    }


    // update category
    public function update(Request $request) {
        /* Validation */
        $validator = Validator::make($request->all(), [
            'slug' => 'required|string',
            'name' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $category = Category::where('slug', $request->slug)->first();
        
        if (!$category) {
            return response()->json(["message" => "Not found!"], 400);
        }

        $category->name = $request->name;
        $category->save();

        return response()->json(["message" => "success!"], 200);
    }
}
