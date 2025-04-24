<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    // add new task
    public function create(Request $request) {

        /* Validation */
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'title' => 'required|string',
            'desc' => 'nullable|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $category = Category::where('slug', $request->category)->first();
        
        if (!$category) {
            return response()->json(["message" => "Category Not found!"], 400);
        }


        Task::create([
            "category" => $request->category,
            "title" => $request->title,
            "description" => $request->desc ? $request->desc : "description..."
        ]);

        return response()->json(["message"], 200);
    }


    // update tasks order
    public function updateTasksOrder(Request $request) {
        $categories = $request->input('categories');

        foreach ($categories as $categoryData) {
            $category = Category::where('slug', $categoryData['slug'])->first();

            if ($category) {
                foreach ($categoryData['tasks'] as $taskData) {
                    $task = Task::where('slug', $taskData['slug'])->first();

                    if ($task) {
                        if ($task->category !== $category->slug) {
                            $task->category = $category->slug;
                        }
                        // Update the task's rank
                        $task->rank = $taskData['rank'];
                        $task->save();
                    }
                }
            }
        }

        return response()->json(['message' => 'success!']);
    }
}
