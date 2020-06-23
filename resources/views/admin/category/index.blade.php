@extends('layouts.app')

@section('title', 'all categories')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                        <li class="breadcrumb-item active">All categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <form>
                            <select name="limit" id="">
                                <option value="5" {{Request::get('limit') == 5? 'selected' : ''}}>5</option>
                                <option value="10" {{Request::get('limit') == 10? 'selected' : ''}}>10</option>
                                <option value="25" {{Request::get('limit') == 25? 'selected' : ''}}>25</option>
                            </select>
                            <button type="submit">Rows</button>
                        </form>
                    </div>
                
                        <form class="form-inline">
                            <input type="text" name="search" class="form form-control" style="margin-right: 5px">
                            <button type="submit" class="btn btn-info" style="margin-right: 5px">Search</button>
                            <a href="{{ route('categories.index')}}" >Reset</a>                            
                        </form>
                    
                    <div class="col text-right">
                        <a href="{{route('categories.create')}}" class="btn btn-success">Create</a>
                    </div>
                </div>               
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Actions</th>
                        </tr>
                        <tbody>

                            @foreach ($categories as $category)                
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    {{-- {{$category->parent? $category->parent->name : ''}} --}}
                                    @if ($category->parent)
                                        <a href="{{route('categories.show', $category->parent)}}" class="link_item">{{$category->parent->name}}</a>                                        
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categories.show', $category)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('categories.edit', $category)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('categories.destroy', $category)}}" class="btn btn-danger">Delete</a>                                
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                {!!$categories->links()!!}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection