@extends('vendor.multiauth.layouts.mainapp')

@section('nav_head')
    questions
@endsection

@section('content')
    <div class="row justify-content-between">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Select Category
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($categories as $category)
                    <a class="dropdown-item" id="cat{{$category->id}}" href="{{route('question.show',$category->id)}}">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <a href="{{route('question.create')}}" class="btn btn-primary btn-icon">
            <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
            <span class="btn-inner--text">add question</span>
        </a>
    </div>
    <div class="row mt-5">
        <div class="col questions">
            @if(!empty($questions))
                @php($i = 1)
                @foreach($questions as $question)
                    <div class="pb-4">
                        <div class="card">
                            <div class="card-header justify-content-between"><span>{{$i++}}. {{$question->question}}</span>
                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                    <a href="{{route('question.edit',$question->id)}}" class="mr-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                                    </a>
                                    <form action="{{route('question.destroy',$question->id)}}" method="post">
                                        @csrf @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body pl-5">
                                <h5 class="card-title">
                                    1. {{$question->option1}}
                                    @if($question->correct == $question->option1)
                                        <strong>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-bold-right"></i>
                                            CORRECT
                                        </strong>
                                    @endif
                                </h5>
                                <h5 class="card-title">
                                    2. {{$question->option2}}
                                    @if($question->correct == $question->option2)
                                        <strong>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-bold-right"></i>
                                            CORRECT
                                        </strong>
                                    @endif
                                </h5>
                                <h5 class="card-title">
                                    3. {{$question->option3}}
                                    @if($question->correct == $question->option3)
                                        <strong>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-bold-right"></i>
                                            CORRECT
                                        </strong>
                                    @endif
                                </h5>
                                <h5 class="card-title">
                                    4. {{$question->option4}}
                                    @if($question->correct == $question->option4)
                                        <strong>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-fat-delete"></i>
                                            <i class="ni ni-bold-right"></i>
                                            CORRECT
                                        </strong>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection