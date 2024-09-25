<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductQuestionAnswer;
use App\Models\Question;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('products.createNew', compact('categories'));
    }
    public function getQuestions($categoryId)
    {
        $questions = Question::where('category_id', $categoryId)->get();
        return response()->json($questions);
    }

    public function store(ProductRequest  $request)
    {
        $data = $request->validated();
        //dd($request->questions );
        $product = Product::create($data);

        foreach ($request->questions as $questionId => $answer) {
            ProductQuestionAnswer::create([
                'product_id' => $product->id,
                'question_id' => $questionId,
                'answer' => $answer,
            ]);
        }

        return redirect()->route('products.create')->with('success', 'Product created successfully');
    }

}
