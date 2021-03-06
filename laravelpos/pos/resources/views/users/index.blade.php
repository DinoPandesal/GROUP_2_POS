@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add User</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addUser">
                            <i class="fa fa-plus"></i> Add New User </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@if ($user->is_admin == 1) Admin
                                        @else Cashier
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#showUser{{$user->id}}"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUser{{$user->id}}"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal of Show User Detail -->
                                <div class="modal right fade" id="showUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.show', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input readonly type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input readonly type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" id="" value="{{$user->phone}}" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input readonly type="password" name="password" readonly value="{{$user->password}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" name="comfirm_password" id="" class="form-control">
                                                    </div> -->
                                                    <div class="form-group" readonly>
                                                        <label for="">Role</label>
                                                        <select name="is_admin" id="" class="form-control">
                                                            <option value="1" @if($user->is_admin==1)
                                                                selected
                                                                @endif>Admin</option>
                                                            <option value="2" @if($user->is_admin==2)
                                                                selected
                                                                @endif>Cashier</option>
                                                        </select>
                                                    </div>
                                                
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Edit User Detail -->
                                <div class="modal right fade" id="editUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.update', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" id="" value="{{$user->phone}}" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" readonly value="{{$user->password}}" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" name="comfirm_password" id="" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Role</label>
                                                        <select name="is_admin" id="" class="form-control">
                                                            <option value="1" @if($user->is_admin==1)
                                                                selected
                                                                @endif>Admin</option>
                                                            <option value="2" @if($user->is_admin==2)
                                                                selected
                                                                @endif>Cashier</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Update User</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Delete User Detail -->
                                <div class="modal right fade" id="deleteUser{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                {{$user->id}}
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <p>Are you sure you want to delete this {{$user->name}} ? </p>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search User</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal of adding new user -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="is_admin" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Cashier</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save User</button>
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