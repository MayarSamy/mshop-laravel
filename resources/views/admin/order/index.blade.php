@extends('layouts.app')

@section('title', 'all orders')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Admin</a></li>
                        <li class="breadcrumb-item active">All orders</li>
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
                            <a href="{{ route('orders.index')}}" >Reset</a>                            
                        </form> --}}
                    
                    <div class="col text-right">
                        <a href="{{route('admin.orders.create')}}" class="btn btn-success">Create</a>
                    </div>
                </div>               
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Actions</th>
                        </tr>
                        <tbody>

                            @foreach ($orders as $order)                
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->name}}</td>                                    
                                <td>
                                    <a href="{{route('admin.orders.show', $order)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('admin.orders.edit', $order)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('admin.orders.destroy', $order)}}" method="POST" class="d-inline-block">
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
                {!!$orders->links()!!}
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection