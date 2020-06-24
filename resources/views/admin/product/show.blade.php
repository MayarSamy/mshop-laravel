@extends('layouts.app')

@section('title', 'all products')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">products</a></li>
                        <li class="breadcrumb-item active">Show product: {{$product->name}}</li>
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
                <h2>Title: {{$product->name}}</h2>
                <p>description: {{$product->description}}</p>
                @if ($product->category)
                    Parent: <a href="{{route('admin.categories.show', $product->category)}}">{{$product->category->name}}</a>
                @endif
                <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection