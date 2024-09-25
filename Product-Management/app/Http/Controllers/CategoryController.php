<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        return view('categories.createNew');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = Category::create([
            'name' => $data['name'],
        ]);

        foreach ($data['questions'] as $questioninfo) {
            $question = new Question();
            $question->question = $questioninfo['question'];
            $question->type = $questioninfo['type'];
            $question->is_required = $questioninfo['is_required'];
            $question->category_id = $category->id;
            //dd($question);
            if ( $questioninfo['type'] == 'select' && isset($questioninfo['options'])) {
                $question->options = json_encode($questioninfo['options']);
            }
            //dd($question);
            $question->save();
        }

        return redirect()->route('categories.create')->with('success', 'Category and questions added successfully');
    }
}
