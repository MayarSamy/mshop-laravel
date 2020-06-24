<li class="nav-item">
    <a href="{{route('admin.categories.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Category
        </p>
    </a>
    <form action="{{route('logout')}}" method="POST" class="nav-link text-center">
        @csrf
        <button type="submit" class="btn btn-link"> Logout</button>
    </form>
</li>