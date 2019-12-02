@extends('layouts.adminpage')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Category Management</h4>
            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal3">Add Category
            </button>

            <table id="tableStaffs" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cate ID</th>
                        <th>CateName</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($category as $categorys)

                    <tr>
                        <td>{{$categorys->id}}</td>
                        <td>{{$categorys->categoryName}}</td>
                        <td>{{$categorys->created_at}}</td>
                        <td>{{$categorys->updated_at}}</td>
                        <td>
                            
                            <a id='btn-view-{{$categorys->id}}' onclick="viewDetailCate({{$categorys->id}})" href="#custom-modal3" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
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
                                        <button type="button" class="btn btn-success" onclick="confirmDeleteCate()" data-dismiss="modal">Yes</button>
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
                <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Add Cate</h4>


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
                                        <form id="formAdd" class="form-horizontal" onsubmit="return validateCateName(this)"  enctype="multipart/form-data" role="form" method="POST" action="/api/admin/addcate">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">CateName</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="categorynameAdd" name="categorynameAdd"  required class="form-control" placeholder="category name...">
                                                    <div id="trungcate" style="color:red; display:none">CateName này đã được dùng</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success" value="Add">
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
    <h4 class="custom-modal-title">Category Detail information</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" action="/api/admin/cate" method="POST" id="fileUploadForm">
            {{ csrf_field() }}
                <div class="profile-info-name row">
                    <!-- <div class='col-sm-3'>
                        <img id='cate-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="category-image">
                        <div>
                            <label for="imagestaff" class="btn">Change image</label>
                            <input id="imagestaff" name="imagestaff" style="display:none" type="file">
                        </div>
                    </div> -->
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%">Cate ID</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="CateIDLablel" disabled> 
                                            <input type="text" id="cateid" name="cateid" class="form-control" style='display:none'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Category Name</td>
                                        <td width="65%">
                                            <input type="text" required id="catename" name="catename" class="form-control">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td width="35%">created at</td>
                                        <td width="65%">
                                            <input type="text" required id="createdatcate" name="createdatcate" class="form-control">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td width="35%">PassWord</td>
                                        <td width="65%">
                                            <input type="text" id="staffpassword" name="staffpassword" class="form-control">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td width="35%">updated at</td>
                                        <td width="65%">
                                            <input type="text" required id="updatedatcate" name="updatedatcate" class="form-control">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
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
                                            <input type="date" id="staffdob" name="staffdob" data-date="" class="form-control" data-date-format="yyyy mm dd">
                                        </td>
                                    </tr> -->
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