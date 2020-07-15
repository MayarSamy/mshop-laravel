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

                <table class="table table-bordered table-data">
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
                        
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('js')
    <script>

        $(function(){
            getAllProducts();
        });

        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            getAllProducts($(this).text());
        }); 

        $(document).on('click', '.delete', function(e){
            //e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{csrf_token()}}'
                            },
                            success: function(res)
                            {
                                if (result.value) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    );

                                } 
                                getAllProducts();  
                            }
                        })
                    }
                })
            }); 

        function getAllProducts(page)
        {
            $.ajax({
                url: '{{route("admin.get-products")}}?page' + page,
                type: 'GET',
                success:function(res)
                {
                    $('.table-data tbody').html(res);
                }
            })
        }
    </script>
@endsection

