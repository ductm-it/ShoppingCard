@extends('layouts.adminpage')
@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Product Management</h4>

            <!-- Button trigger modal -->
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal1">Add Product
            </button>
            <table id="tableStaffs" class="table table-bordered">

                <thead>
                    <tr>

                        <th>Product_ID</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>in stock</th>
                        <th>action</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach($shoes as $shoe)
                    <tr>
                        <td>{{$shoe->id}}</td>
                        <td>{{$shoe->name}}</td>
                        <td>{{$shoe->categoryName}}</td>
                        <td>{{$shoe->inStock}}</td>

                        <td>
                            <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="setIdProduct({{$shoe->id}})">
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
                                            <button type="button" class="btn btn-success" onclick="confirmDeleteProduct()" data-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <a id='btn-view-{{$shoe->id}}' onclick="viewDetailProduct({{$shoe->id}})" href="#custom-modal" class="btn btn-icon waves-effect waves-light btn-success m-b-5 " data-animation="door" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">
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
<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Add Product</h4>


                            <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                        @if(count($errors)>0)
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
                                        @endif
                                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/api/admin/product">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" required class="form-control" placeholder="Name product...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Decription </label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="description" class="form-control" placeholder="Decription">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="categoryid" class="col-sm-3 col-form-label">Category</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" required id="categoryid" name="categoryid">
                                                        @foreach($category as $categorys)
                                                        <option value="1">{{$categorys->categoryName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-file mb-3">
                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                        <label class="custom-file-label" for="image">Choose file image</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">inPrice</label>
                                                <div class="col-sm-9">
                                                    <input type="number" required name="inprice" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">outPrice</label>
                                                <div class="col-sm-9">
                                                    <input type="number" required name="outprice" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">inStock</label>
                                                <div class="col-sm-9">
                                                    <input type="number" required name="instock" class="form-control">
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
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Detail information Product</h4>
    <div class="custom-modal-text">
        <div class="bg-picture card-box">
            <form enctype="multipart/form-data" action="/api/admin/updateProduct"  method="POST" id="fileUploadForm">
            {{ csrf_field() }}
                <div class="profile-info-name row">
                    <div class='col-sm-3'>
                        <img id='product-avatar' src='{{asset("/images/avatar.png")}}' class="img-thumbnail" alt="Product_Image">
                        <div>
                            <label for="image2" class="btn">Change image</label>
                            <input id="image2" name="image2" onchange="loadFileImageProduct(event)" style="display:none" type="file">
                        </div>
                    </div>
                    <div class='col-sm-9'>
                        <div class="profile-info-detail">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">ID</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" id="ProductIDLablel" disabled> 
                                            <input type="text" name="ProductID" id="ProductID" style='display:none'> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Name</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="ProductName" id="ProductName">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%" style="text-align:center;vertical-align: middle;">Description</td>
                                        <td width="65%">
                                            <textarea class="form-control" rows="4" cols="15" id="ProductDescription" name="ProductDescription"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:center;vertical-align: middle;">CategoryID</td>
                                        <td>
                                            <select class="form-control" name="categoryid" id="categoryid">
                                                <option value="#" id="selectedCate"></option>
                                                @foreach($category as $categorys)
                                                <option value="{{$categorys->id}}">{{$categorys->categoryName}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" style="text-align:center;vertical-align: middle;">Inprice</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="inprice" id="inprice">
                                        </td>
                                        <td width="15%" style="text-align:center;vertical-align: middle;">VND</td>
                                    </tr>
                                    <tr>
                                        <td width="20%" style="text-align:center;vertical-align: middle;">Outprice</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="outprice" id="outprice">
                                        </td>
                                        <td width="15%" style="text-align:center;vertical-align: middle;">VND</td>
                                    </tr>
                                    <tr>
                                        <td width="20%" style="text-align:center;vertical-align: middle;">Instock</td>
                                        <td width="65%">
                                            <input type="text" class="form-control" name="instock" id="instock">
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Created_at</td>
                                        <td>
                                            <input type="text" name="createdat" id="createdat">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Updated_at</td>
                                        <td>
                                            <input type="text" name="updatedat" id="updatedat">
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Date of birth</td>
                                        <td><a href="#" id="inline-dob" data-type="combodate" data-value="1984-05-15"
                                                data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY"
                                                data-pk="1" data-title="Select Date of birth" class="editable editable-click"></a></td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" onclick="Custombox.close()">Cancel</button>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" id='btnUpdateProduct'>Save</button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection