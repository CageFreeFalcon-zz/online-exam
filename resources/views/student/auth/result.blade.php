@extends('student.layouts.main')

@section('nav_head')
    result
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h2>Result</h2>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="col-6">Question</th>
                            <th scope="col" class="col-2">Correct Option</th>
                            <th scope="col" class="col-2">Selected Option</th>
                            <th scope="col" class="col-2">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- fourth row -->
                        @foreach($questions as $question)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{$j+1}}. {{$question->question}}</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="text-center text">
                                    {{$question->correct}}
                                </td>
                                <td class="text-center">
                                    {{$submitted[$j]}}
                                </td>
                                <td class="text-center">
{{--                                    @if($submitted[$j++] != 0)--}}
                                        @if($question->correct == $submitted[$j++])
                                            <i class="fa fa-check text-green" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                        @endif
{{--                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="">
                            <th scope="row" class="text-right text-lg">Total Marks Obtained
                            </th>
                            <td class="text-left text-lg">{{$marks}}</td>
                            <td colspan="2"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection