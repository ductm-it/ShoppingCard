@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">User Management</h4>
            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal2">Add User
            </button>

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>UserName</th>
                        <th>FullName</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                            type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                            onclick="setIdUser({{$user->id}})">
                                <i class="fa fa-trash"></i>
                            </button>

                            

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure to want delete ?</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                    

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="confirmDeleteUser()" data-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a id='btn-view-{{$user->id}}' onclick="viewDetailUser({{$user->id}})" href="#custom-modal" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

<!-- sample modal content -->
<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Add User</h4>

                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">

                                        <form id="form-add-user" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/api/admin/user1">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">UserName</label>
                                                <div class="col-sm-9">
                                                    <input id='usernameUser' type="text" name="username" class="form-control" required placeholder="username...">
                                                    <div id="trunguser" style="color:red; display:none">Username này đã được dùng</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Full Name</label>
                                                <div class="col-sm-9">
                                                        <input type="text" name="fullname" required class="form-control" placeholder="Full Name">
                                                </div>
                                                    
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password </label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" required class="form-control" placeholder="PassWord">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input" id="imageuser" name="imageuser">
                                                        <label class="custom-file-label" for="imageuser">Choose file image</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Adress</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="email" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Day Of birth</label>
                                                <div class="col-sm-9">
                                                <input type="date" id="dob" name="dob" data-date="" class="form-control" data-date-format="yyyy mm dd">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input id="btn-newUser" type="button" class="btn btn-success" value="Add">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                        </div> <!-- end card-box -->
                    </div><!-- end col -->
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information User</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" action="/api/admin/updateUser"  method="POST" id="fileUploadForm">
            {{ csrf_field() }}
                <div class="profile-info-name row">
                    <div class='col-sm-3'>
                        <img id='user-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="User_Image">
                        <div>
                            <label for="imageUser" class="btn">Change image</label>
                            <input id="imageUser" name="imageUser" onchange="loadFileImageUser(event)"  style="display:none" type="file">
                        </div>
                    </div>
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">ID</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="UserIDLablel" disabled> 
                                            <input type="text" name="UserID" id="UserID" style="display:none"> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">UserName</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="UsernameLablel" disabled> 
                                            <input type="text" class="form-control" name="username" id="username" style="display:none">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Full Name</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="fullname" id="fullname">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Address</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="address" id="address">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Email</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="email" id="email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Day Of Birth</td>
                                        <td width="65%">
                                            <input type="date" id="dob1" name="dob1" data-date="" class="form-control" data-date-format="yyyy mm dd">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" id='btnUpdateUser'>Save</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection