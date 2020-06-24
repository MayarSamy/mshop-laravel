@extends('layouts.app')

@section('title', 'all products')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admin</a></li>
                        <li class="breadcrumb-item active">All products</li>
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
                        {{-- <form class="form-inline">
                            <input type="text" name="search" class="form form-control" style="margin-right: 5px">
                            <button type="submit" class="btn btn-info" style="margin-right: 5px">Search</button>
                            <a href="{{ route('categories.index')}}" >Reset</a>                            
                        </form> --}}
                    
                    <div class="col text-right">
                        <a href="{{route('admin.products.create')}}" class="btn btn-success">Create</a>
                    </div>
                </div>               
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                        <tbody>

                            @foreach ($products as $product)                
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    @if ($product->category)
                                        <a href="{{route('admin.products.show', $product->category)}}" class="link_item">{{$product->category->name}}</a>                                        
                                    @endif
                                </td>
                                <td>
                                    @if ($product->user)
                                        <a href="{{route('admin.products.show', $product->user)}}" class="link_item">{{$product->user->name}}</a>                                        
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.products.show', $product)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admin.products.destroy', $product)}}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>
                    </thead>
                </table>
                {!!$products->links()!!}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection