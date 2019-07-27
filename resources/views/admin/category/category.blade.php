@extends('vendor.multiauth.layouts.mainapp')
@section('nav_head')
    category
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Categories</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="col-6">Name</th>
                            <th scope="col" class="col-3"></th>
                            <th scope="col" class="col-3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- fourth row -->
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{$category->name}}</span>
                                            <span class="badge badge-success badge-pill">{{$category->questions->count()}} Questions</span>
                                        </div>
                                    </div>
                                    <form action="{{route('category.update',$category->id)}}" method="post"
                                          class="col-12 p-0 d-none" id="form{{$category->id}}">
                                        @csrf
                                        @method('put')
                                        <input type="text" class="form-control form-control-md" name="name"
                                               value="{{$category->name}}" required>
                                    </form>
                                </th>
                                <td>
                                    <button type="button" class="btn btn-outline-primary edit btn-block btn-icon">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        <span class="btn-inner--text">edit</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none update btn-icon"
                                            form="form{{$category->id}}">

                                        <span class="btn-inner--icon"><i class="fa fa-angle-double-up"
                                                                         aria-hidden="true"></i></span>
                                        <span class="btn-inner--text">update</span>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger delete btn-block btn-icon">
                                            <span class="btn-inner--icon">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                            <span class="btn-inner--text">delete</span>
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-danger d-none cancel btn-block btn-icon">
                                        <span class="btn-inner--icon">
                                            <i class="far fa-times-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="btn-inner--text">cancel</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="d-none" id="addrow">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <form action="{{route('category.store')}}" method="post" class="col-12 p-0"
                                          id="addform">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control form-control-md col-12"
                                                   name="name" placeholder="category name" value="{{old('name')}}"
                                                   required>
                                            @if($errors->has('name'))
                                                <small id="helpId"
                                                       class="form-text text-muted">{{$error->first()}}</small>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </th>
                            <td colspan="2">
                                <button type="submit" class="btn btn-outline-primary btn-block"
                                        form="addform">Add
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <button type="button" class="btn btn-info text-white btn-icon" id="addcat">
                        <span class="btn-inner--icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="btn-inner--text">Add Category</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#addcat').click(function () {
                $('#addrow').toggleClass('d-none');
            });
            $('.edit, .cancel').click(function () {
                $(this).parent().parent().find('form, .edit, .delete, .cancel, .update, .media-body')
                    .toggleClass('d-none');
            });
        });
    </script>
@endsection