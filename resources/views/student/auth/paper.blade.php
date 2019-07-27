@extends('student.layouts.main')

@section('nav_head')
    {{App\Category::find($id)->name}} paper
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <!-- card1 -->
            <form action="{{route('paper.submit')}}" method="post" id="form">
                @csrf
                <input type="hidden" name="category_id" value="{{$id}}">
                @foreach($questions as $question)
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <i class="far fa-bookmark float-right text-primary bookquestion" id="{{$i}}"></i>
                            <h3 class="card-title">{{$i++}}. {{$question->question}}</h3>
                            <div class="custom-control custom-radio d-none">
                                <input type="radio" id="option0{{$question->id}}" class="custom-control-input" value="Not Attemped"
                                       name="answer{{$question->id}}" checked>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" id="option1{{$question->id}}" class="custom-control-input" value="{{$question->option1}}"
                                       name="answer{{$question->id}}">
                                <label class="custom-control-label"
                                       for="option1{{$question->id}}">{{$question->option1}}</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" id="option2{{$question->id}}" class="custom-control-input" value="{{$question->option2}}"
                                       name="answer{{$question->id}}">
                                <label class="custom-control-label"
                                       for="option2{{$question->id}}">{{$question->option2}}</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" id="option3{{$question->id}}" class="custom-control-input" value="{{$question->option3}}"
                                       name="answer{{$question->id}}">
                                <label class="custom-control-label"
                                       for="option3{{$question->id}}">{{$question->option3}}</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="option4{{$question->id}}" class="custom-control-input" value="{{$question->option4}}"
                                       name="answer{{$question->id}}">
                                <label class="custom-control-label"
                                       for="option4{{$question->id}}">{{$question->option4}}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
        <div class="col-4">
            <div class="card position-sticky top-3">
                <div class="card-header bg-gradient-primary text-white">
                    <div class="timer" data-minutes-left={{$i*2-2}}></div>
                </div>
                <div class="card-body">
                    <div class="row text-center text-primary">
                        @foreach($questions as $question)
                            <div class="col-3 p-1">
                                <div class="rounded border border-primary p-3" id="book{{$j}}">
                                    {{$j++}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="card-footer btn btn-primary bg-gradient-primary" type="submit" form="form">
                    Submit
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/timer.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.logout').addClass("d-none");
            $('a').attr("href", '#');
            $('.bookquestion').click(function () {
                var id = $(this).attr('id');
                $(this).toggleClass('fa');
                $('#book' + id).toggleClass('bg-primary text-white');
            });
            $('.timer').startTimer({
                elementContainer: "span",
                onComplete: function(){
                    $('#form').submit();
                }
            });
        });
    </script>
@endsection