@extends('vendor.multiauth.layouts.mainapp')

@section('nav_head')
    Add Question
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h4 class="text-white">{{ $error }}</h4>
            @endforeach
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('question.store')}}" method="post" id="formid">
                @csrf
                <input type="hidden" name="correct" value="{{old('correct')}}" id="correct">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="question">Question</label>
                                <textarea class="form-control" id="question" rows="3" name="question"
                                          placeholder="Question"
                                          value="{{old('question')}}" autofocus required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="option1">Option 1</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" name="option">
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="option1" id="option1"
                                           placeholder="Option 1" value="{{old('option1')}}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="option2">Option 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" name="option">
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="option2" id="option2"
                                           placeholder="Option 2" value="{{old('option2')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="option3">Option 3</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" name="option">
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="option3" id="option3"
                                           placeholder="Option 3" value="{{old('option3')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="option4">Option 4</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" name="option">
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="option4" id="option4"
                                           placeholder="Option 4" value="{{old('option4')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{(old('category')==$category->id)?'selected':''}}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" form="formid" class="btn btn-outline-primary">submit</button>
            <a class="btn btn-danger" href="{{route('question.index')}}" role="button">Cancel</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.pretty input[type=radio]').click(function () {
                var correct = $(this).parentsUntil('.form-group').find('input[type=text]').val();
                $('#correct').val(correct);
            });
        });
    </script>
@endsection