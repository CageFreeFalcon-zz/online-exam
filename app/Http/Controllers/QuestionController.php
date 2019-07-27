<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Category;
use App\Question;

class QuestionController extends Controller
{
    public function __construct () {
        $this->middleware('auth:admin');
    }

    public function index () {
        $categories = Category::all();
        return view('admin.question.index',compact('categories'));
    }

    public function create () {
        $categories = Category::all();
        return view('admin.question.create', compact('categories'));
    }

    public function store (QuestionRequest $request) {
        Question::create([
            'category_id' => $request->category,
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'correct' => $request->correct,
        ]);
        return redirect('question');
    }

    public function show ($id) {
        $questions = Category::find($id)->questions;
        $categories = Category::all();
        return view('admin.question.index',compact('questions','categories'));
    }

    public function edit ($id) {
        $question = Question::find($id);
        $categories = Category::all();
        return view('admin.question.edit',compact('question','categories'));
    }

    public function update (QuestionRequest $request, $id) {
        Question::find($id)->update([
            'category_id' => $request->category,
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'correct' => $request->correct,
        ]);
        return redirect('question');
    }

    public function destroy ($id) {
        Question::find($id)->delete();
        return redirect('question');
    }

    public function marks(){
        $categories = Category::all();
//        $students = Category::find(4)->student();
        return view('admin.students.marks',compact('categories'));
    }
}
