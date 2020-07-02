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
                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">orders</a></li>
                        <li class="breadcrumb-item active">Show order: {{$order->name}}</li>
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
                <h2>Custonmer Name: {{$order->customer->name}}</h2>
                <p>Order Date: {{$order->date}}</p>
                <p>Payment Method: {{$order->payment->name}}</p>

                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody id="products-list">
                        @foreach ($products as $product)                 
                                <tr>
                                    <td>
                                        <h6>{{$product->name}}</h6>
                                    </td>
            
                                    {{-- product order quantity --}}
                                    <td>
                                        <h6>{{$product->pivot->quantity}}</h6>
                                    </td>
            
                                    {{-- product price --}}
                                    <td>
                                        <h6>{{$product->pivot->price}}</h6>
                                    </td>
            
                                    {{-- product order total --}}
                                    <td>
                                        <h6>{{$product->pivot->total}}</h6>

                                    </td>
            
                                </tr>
                            @endforeach
                    
                    </tbody>
            
                </table>
                
                <a href="{{route('admin.orders.edit', $order)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection