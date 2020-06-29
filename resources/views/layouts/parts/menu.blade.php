<li class="nav-item">
    <a href="{{route('admin.categories.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.categories.index'? 'active': '' }}" >
        <i class="nav-icon fas fa-th"></i>
        <p>
            Categories
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.products.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.products.index'? 'active': '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Products
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.customers.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.customers.index'? 'active': '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Customers
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('admin.payments.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.payments.index'? 'active': '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Payment methods
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('admin.orders.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.orders.index'? 'active': '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Orders
        </p>
    </a>
</li>

<li class="nav-item">
    <form action="{{route('logout')}}" method="POST" class="nav-link text-center">
        @csrf
        <button type="submit" class="btn btn-link"> Logout</button>
    </form>
</li>