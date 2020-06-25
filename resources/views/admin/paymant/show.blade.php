@extends('layouts.app')

@section('title', 'all payment methods')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> payment methods</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.payments.index')}}">payment method</a></li>
                        <li class="breadcrumb-item active">Show payment method: {{$payment->name}}</li>
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
                <h2>payment method: {{$payment->name}}</h2>
                <p>description: {{$payment->description}}</p>
                <a href="{{route('admin.payments.edit', $payment)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection