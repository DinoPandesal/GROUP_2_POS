<a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i> Users</a>
<a href="{{ route('products.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-utensils"></i> Products</a>
<a href="{{ route('orders.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-shopping-cart"></i> Orders</a>

<style>
    .btn-outline{
        border-color: #008b8b;
        color: #008b8b;
    }

    .btn-outline:hover{
        background: #008b8b;
        color: #fff;
    }
</style>