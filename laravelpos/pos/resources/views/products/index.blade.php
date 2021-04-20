@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add Products</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addproducts">
                            <i class="fa fa-plus"></i> Add New Products </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ number_format($product->price,2) }}</td>
                                    <td>{{ $product->quantity }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#showproducts{{$product->id}}"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editproducts{{$product->id}}"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteproducts{{$product->id}}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal of Show products Detail -->
                                <div class="modal right fade" id="showproducts{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Products</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.show', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <div class="form-group">
                                                        <label for="">Product Name</label>
                                                        <input type="text"  readonly name="product_name" id="" value="{{  $product->product_name }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" readonly  name="price" id="" value="{{  $product->price }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label>
                                                        <input type="number" readonly  name="quantity" value="{{  $product->quantity }}" class="form-control">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Edit products Detail -->
                                <div class="modal right fade" id="editproducts{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Edit Products</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.update', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <div class="form-group">
                                                        <label for="">Product Name</label>
                                                        <input type="text" name="product_name" id="" value="{{  $product->product_name }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" name="price" id="" value="{{  $product->price }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label>
                                                        <input type="number" name="quantity" value="{{  $product->quantity }}" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Update Product</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Delete products Detail -->
                                <div class="modal right fade" id="deleteproducts{{$product->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Delete Products</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$product->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>Are you sure you want to delete {{$product->product_name}} ? </p>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                {{$products->links('pagination::bootstrap-4')}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search Products</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal of adding new products -->
<div class="modal right fade" id="addproducts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add Products</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" id="" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save Products</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<style>
    .modal.right .modal-dialog {
        margin-left: 500px;
        /* position: absolute;
        top: 0;
        right: 0;
        margin-right: 20vh;*/
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>
@endsection