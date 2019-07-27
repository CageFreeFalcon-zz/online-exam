@extends('student.layouts.main')

@section('nav_head')
    Paper list
@endsection

@section('content')
    <div class="row">
        @foreach($categories as $category)
            <div class="col-6 pb-4">
                <div class="card shadow">
                    <div class="card-header bg-gradient-green text-white">
                        {{$category->name}}
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Total no of Questions : {{$category->questions()->count()}}</h4>
                        <h4 class="card-title">Time given : {{($category->questions()->count())*2}}</h4>
                    </div>
                    <div class="card-footer text-muted align-content-center">
                        <a class="btn float-right bg-gradient-green text-white" href="{{route('paper.show',$category->id)}}" role="button">Start Exam</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection