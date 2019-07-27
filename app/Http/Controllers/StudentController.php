<?php

namespace App\Http\Controllers;

use App\Category;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct () {
        $this->middleware('student.auth:student');
    }

    public function showquestion ($id) {
        $questions = Category::find($id)->questions;
        $i = 1;
        $j = 1;
        return view('student.auth.paper', compact('questions', 'i', 'j', 'id'));
    }

    public function showresult (Request $request) {
        $marks = 0;
        $i = 0;
        $j=0;
        $submitted = [];
//        $submitted_answer = [];
        $correct=[];
        $questions = Category::find($request->category_id)->questions;
        foreach ($questions as $question) {
            $submitted[$i] = $request->input('answer' . $question->id);
//            $submitted_answer[$i] = ;
            $correct[$i] = $question->correct;
            if ($correct[$i] == $submitted[$i]) {
                $marks++;
            }
            $i++;
        }
        Student::find(auth('student')->user()->id)->category()->attach($request->category_id,['marks_obtain'=>$marks]);
        return view('student.auth.result', compact('questions','submitted','j','marks'));
    }

    public function showpaperlist () {
        $categories = Category::all();
        return view('student.auth.paperlist', compact('categories'));
    }
}
