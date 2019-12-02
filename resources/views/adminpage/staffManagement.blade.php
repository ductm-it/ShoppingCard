@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Staff Management</h4>
            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal3">Add Staff
            </button>

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Username</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button type="button" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="setIdStaff({{$user->id}})" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-trash"></i>
                            </button>
                            <a id='btn-view-{{$user->id}}' onclick="viewDetailStaff({{$user->id}})" href="#custom-modal3" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure to want delete ?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>



                                    <!-- Modal footer -->
                                    <div class="modal-footer" style="justify-content:center;">
                                        <button type="button" class="btn btn-success" onclick="confirmDeleteStaff()" data-dismiss="modal">Yes</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<!-- sample modal content -->
<div id="myModal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Staff</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Add Staff</h4>


                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                        <!-- @if(count($errors)>0)
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if(\Session::has('success'))
                                        <div class="alert alert-success">
                                            <p>{{\Session::get('success')}}</p>

                                        </div>
                                        @endif -->
                                        <form id="formAdd" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/api/admin/addstaff">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">UserName</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="staffusernameAdd" name="staffusernameAdd"  required class="form-control" placeholder="username...">
                                                    <div id="trunguser" style="color:red; display:none">Username này đã được dùng</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Full Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="stafffullnameAdd" required class="form-control" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Password </label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="staffpasswordAdd" class="form-control" required placeholder="PassWord">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input" id="imagestaffAdd" name="imagestaffAdd">
                                                        <label class="custom-file-label" for="imagestaffAdd">Choose file image</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rolestaff" class="col-sm-3 col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" required id="rolestaff" name="rolestaff">
                                                       
                                                        <option value="admin">admin</option>
                                                        <option value="staff">staff</option>
                                                     
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Adress</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="staffaddressAdd" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email"  name="staffemailAdd" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Day Of birth</label>
                                                <div class="col-sm-9">
                                                <input type="date" id="staffdobAdd" name="staffdobAdd" data-date="" class="form-control" data-date-format="yyyy mm dd">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input id='btn-submitAddStaff' type="button" class="btn btn-success" value="Add">
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

<!-- Modal -->
<div id="custom-modal3" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Staff Detail information</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" action="/api/admin/user" method="POST" id="fileUploadForm">
            {{ csrf_field() }}
                <div class="profile-info-name row">
                    <div class='col-sm-3'>
                        <img id='staff-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="profile-image">
                        <div>
                            <label for="imagestaff" class="btn" >Change Image</label>
                            <input id="imagestaff" name="imagestaff" onchange="loadFileImageStaff(event)" style="display:none" type="file">
                        </div>
                    </div>
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%">Staff ID</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="staffIDLablel" disabled> 
                                            <input type="text" id="staffid" name="staffid" class="form-control" style='display:none'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Username</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="staffUsernameLablel" disabled>
                                            <input type="text" required id="staffusername" name="staffusername" class="form-control" style='display:none'>
                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="35%">Full name</td>
                                        <td width="65%">
                                            <input type="text" required id="stafffullname" name="stafffullname" class="form-control">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td width="35%">PassWord</td>
                                        <td width="65%">
                                            <input type="text" id="staffpassword" name="staffpassword" class="form-control">
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td width="35%">Address</td>
                                        <td width="65%">
                                            <input type="text" required id="staffaddress" name="staffaddress" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Email</td>
                                        <td width="65%">
                                            <input type="text" required id="staffemail" name="staffemail" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            <select class="form-control" required name="staffrole" id="staffrole">
                                                <option value="#" id="selectedRoleStaff" name="optionselected"></option>
                                               
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth</td>
                                        <td>
                                            <!-- <input type="text" required id="staffdob" name="staffdob" class="form-control"> -->
                                            <input type="date" id="staffdob" name="staffdob" data-date="" class="form-control" data-date-format="yyyy mm dd">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" id='btnSubmitUpdateStaff'>Save</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection