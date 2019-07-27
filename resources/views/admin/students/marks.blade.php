@extends('vendor.multiauth.layouts.mainapp')

@section('nav_head')
    Marks Obtained
@endsection

@section('content')
    <div class="row">
        <div class="col p-0">
            <div class="accordion" id="accordionExample">
                @foreach($categories as $category)
                    <div class="card mb-3 shadow">
                        <div class="card-header collapsed" id="heading{{$category->id}}" data-toggle="collapse"
                             data-target="#collapse{{$category->id}}"
                             aria-expanded="false" aria-controls="collapse{{$category->id}}">
                            <span class="badge badge-success badge-pill float-right">{{$category->student->count()}} Students</span>
                            <h5 class="mb-0">{{$category->name}}</h5>
                        </div>
                        <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="heading{{$category->id}}"
                             data-parent="#accordionExample">
                            @php($students = $category->student)
                            @php($i=1)
                            @php($least_marks = ($category->questions->count())*(1/2))
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="col-6">Name</th>
                                        <th scope="col" class="col-3">Marks Obtained</th>
                                        <th scope="col" class="col-3">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        @php($marks = $student->pivot->marks_obtain)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm">{{$i++}}. {{$student->name}}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="text-center">{{$marks}}</td>
                                            <td class="text-center">
                                                @if($marks >= $least_marks)
                                                    <i class="fa fa-check text-green" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection