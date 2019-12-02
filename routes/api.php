<?php

use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;

/**
 * adminpage api
 */
Route::post('/logout','AuthController@logout');
Route::get('user/allRoles', 'UserController@getRoles');
Route::get('/user/{id}', 'UserController@getUserInfo');
Route::post('/user/{id}', 'UserController@updateUser');

Route::get('/user1/{userid}','UserController@getUserInfo1');
Route::get('/cate/{cateid}','CategoryController@getCateInfor');
Route::get('/product/{ProductID}','ProductController@getProductInfo');
Route::post('/product/{ProductID}','ProductController@updateProduct');
// Route::get('user/allRoles','UserController@getRoles');

//delete staff
Route::delete('admin/staff/{id}', 'UserController@deleteUser');
//delete user
Route::delete('admin/user/{id}', 'UserController@deleteUser1');
//delete product
Route::delete('admin/product/{id}', 'ProductController@deleteProduct');
//delete category
Route::delete('admin/cate/{id}','CategoryController@deleteCate');

//add cate
Route::post('admin/addcate',function(Request $request){
    $categoryusernameadd=$request->input('categorynameAdd');
    $created_atCateAdd=now();
    $updated_atCateAdd=now();
    $CateAdd=[
        'categoryName'=>$categoryusernameadd,
        'created_at'=>$created_atCateAdd,
        'updated_at'=>$updated_atCateAdd
    ];
    DB::table('category')->insert(
        $CateAdd
    );
    return redirect('/admin/category');


});

//update cate
Route::post('admin/cate',function(Request $request){
    $cateIdUpdate=$request->input('cateid');
    $CateNameUpdate=$request->input('catename');
    $cateUpdated=now();
    DB::table('category')->where('id',$cateIdUpdate)
    ->update(
        [
            'categoryName' => $CateNameUpdate,
            'updated_at'=>$cateUpdated
        ]);
            
    return redirect('/admin/category');


});

//validateCategoryName
Route::get('/validateCatename/{inputCateName}',function($inputCateName){
    $countCateName=DB::table('category')
        ->where('categoryName',$inputCateName)
        ->count();
        return $countCateName;
});

// update user
Route::post('admin/updateUser', function (Request $request) {
    $userid = $request->input('UserID');
    $username = $request->input('username');
    $fullname = $request->input('fullname');
    $address = $request->input('address'); //
    $email = $request->input('email'); ///
    $dob = $request->input('dob'); //

    $updateArr =
        [
        'username' => $username,
        'fullname' => $fullname,
    ];
    // check address
    if (empty($address) != 1) {
        $updateArr['address'] = $address;
    }
    // check email
    if (empty($email) != 1) {
        $updateArr['email'] = $email;
    }
    // check dob
    if (empty($dob) != 1) {
        $updateArr['dob'] = $dob;
    }
    // check image
    if ($request->hasFile('imageUser')) {
        $image = $request->file('imageUser');
        $newImageURL = UploadFile::uploadFile('upload', $image);
        $updateArr['image'] = $newImageURL;
    }

    // update
    DB::table('users')
        ->where('id', $userid)
        ->update($updateArr);

    return redirect('/admin/manageUser');
});
//add staff
Route::post('admin/addstaff', function (Request $request) {

    $staffusernameadd = $request->input('staffusernameAdd');
    $stafffullnameadd = $request->input('stafffullnameAdd');
    $ArrayUsername = DB::table('users')
        ->select('username')
        ->get();

    $staffpasswordadd = $request->input('staffpasswordAdd');
    $hashPassword = Hash::make($staffpasswordadd);
    $staffaddressadd = $request->input('staffaddressAdd'); //
    $staffemailadd = $request->input('staffemailAdd'); //
    $staffdobadd = $request->input('staffdobAdd'); //
    $created_atStaffAdd = now();
    $updated_atStaffAdd = now();
    $staffroleAdd = $request->get('rolestaff');
    $insertValues =
        [
        'username' => $staffusernameadd,
        'fullname' => $stafffullnameadd,
        'password' => $hashPassword,
        'role' => $staffroleAdd,
        'created_at' => $created_atStaffAdd,
        'updated_at' => $updated_atStaffAdd,
    ];

    // insert image if available
    if ($request->hasFile('imagestaffAdd')) {
        $imageStaffAdd = $request->file('imagestaffAdd');
        $newURLStaffAdd = UploadFile::uploadFile('upload', $imageStaffAdd);
        $insertValues['image'] = $newURLStaffAdd;
    }

    // insert address if not null
    if (empty($staffaddressadd) != 1) {
        $insertValues['address'] = $staffaddressadd;
    }

    // insert email if not null
    if (empty($staffemailadd) != 1) {
        $insertValues['email'] = $staffemailadd;
    }

    // insert dob if not null
    if (empty($staffdobadd) != 1) {
        $insertValues['dob'] = $staffdobadd;
    }

    DB::table('users')->insert(
        $insertValues
    );

    return redirect('/admin/manageStaff');
});
//update staff
Route::post('admin/user', function (Request $request) {
    $staffIdUpdate = $request->input('staffid');
    $staffUsernameUpdate = $request->input('staffusername');
    $staffaddress = $request->input('staffaddress');
    $stafffullname = $request->input('stafffullname');
    // $staffpassword=$request->input('staffpassword');
    $staffemail = $request->input('staffemail');
    $staffdob = $request->input('staffdob');
    $staffrole = $request->get('staffrole');
    $newURLstaff = $request->hasFile('imagestaff');
    $staffUpdatedat = now();
    if ($newURLstaff) {

        $newURLimagestaff = $request->file('imagestaff');
        $URLimagestaff = UploadFile::uploadFile('upload', $newURLimagestaff);
        DB::table('users')
            ->where('id', $staffIdUpdate)
            ->update(
                [
                    'username' => $staffUsernameUpdate,
                    'address' => $staffaddress,
                    // 'password' => $staffpassword,
                    'email' => $staffemail,
                    'dob' => $staffdob,
                    'role' => $staffrole,
                    'fullname' => $stafffullname,
                    'image' => $URLimagestaff,
                    'updated_at' => $staffUpdatedat,
                ]
            );
    } else {
        DB::table('users')
            ->where('id', $staffIdUpdate)
            ->update(
                [
                    'username' => $staffUsernameUpdate,
                    'address' => $staffaddress,
                    // 'password'=>$staffpassword,
                    'email' => $staffemail,
                    'dob' => $staffdob,
                    'role' => $staffrole,
                    'fullname' => $stafffullname,
                    // 'image'=>$URLimagestaff,
                ]);
    }

    return redirect('/admin/manageStaff');

});

//update product
Route::post('admin/updateProduct', function (Request $request) {
    $ProductIdUpdate = $request->input('ProductID');
    $ProductNameUpdate = $request->input('ProductName');
    $ProDescription = $request->input('ProductDescription');
    $categoryid = $request->get('categoryid');
    $inprice = $request->input('inprice');
    $outprice = $request->input('outprice');
    $instock = $request->input('instock');
    // $createdat=$request->input('createdat');
    // $updatedat=$request->input('updatedat');
    $newImageURLUpdate = $request->hasFile('image2');
    if ($newImageURLUpdate) {
        // info('hello');
        $imageUpdate = $request->file('image2');
        $newImageURLUpdate = UploadFile::uploadFile('upload', $imageUpdate);
        DB::table('shoes')
            ->where('id', $ProductIdUpdate)
            ->update([
                'name' => $ProductNameUpdate,
                'description' => $ProDescription,
                'categoryid' => $categoryid,
                'inPrice' => (float) $inprice,
                'outPrice' => (float) $outprice,
                'inStock' => (int) $instock,
                // 'created_at' => $createdat,
                'updated_at' => now(),
                'image' => $newImageURLUpdate,
            ]);
    }
    // info($ProductIdUpdate);
    DB::table('shoes')
        ->where('id', $ProductIdUpdate)
        ->update([
            'name' => $ProductNameUpdate,
            'description' => $ProDescription,
            'categoryid' => $categoryid,
            'inPrice' => (float) $inprice,
            'outPrice' => (float) $outprice,
            'inStock' => (int) $instock,
            // 'created_at' => $createdat,
            'updated_at' => now(),
            // 'image' => $newImageURLUpdate,
        ]);
    return redirect('/admin/manageProduct');

});

//add user
Route::post('admin/user1', function (Request $request) {
    $username = $request->input('username');
    $fullname = $request->input('fullname');
    $password = $request->input('password');
    $hashPasswordCustomer = Hash::make($password);
    $address = $request->input('address'); //
    $email = $request->input('email'); //
    $dob = $request->input('dob'); //

    $created_at = now();
    $updated_at = now();
    $role = 'customer';

    $UserArray = [
        'username' => $username,
        'fullname' => $fullname,
        'password' => $hashPasswordCustomer,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
        'role' => $role,
    ];
    if (empty($address) != 1) {
        $UserArray['address'] = $address;

    }
    if (empty($email) != 1) {
        $UserArray['email'] = $email;
    }
    if (empty($dob) != 1) {
        $UserArray['dob'] = $dob;
    }

    // process upload image
    $hasFile = $request->hasFile('imageuser');
    if ($hasFile) {
        $file = $request->file('imageuser');

        $newImageURL = UploadFile::uploadFile('upload', $file);

        $UserArray['image'] = $newImageURL;
    }

    DB::table('users')->insert(
        $UserArray
    );

    return redirect('/admin/manageUser');
});

//add product
Route::post('admin/product', function (Request $request) {

    $name = $request->input('name');
    $description = $request->input('description');
    $categoryid = $request->input('categoryid');
    $inprice = $request->input('inprice');
    $outprice = $request->input('outprice');
    $instock = $request->input('instock');
    $created_at = now();
    $updated_at = now();
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        //return back()->with('success','Image Upload successfully');
        $newImageURL = UploadFile::uploadFile('upload', $image);
        // $updateArr['image'] = $newImageURL;
        DB::table('shoes')->insert([
            [
                'name' => $name,
                'description' => $description,
                'categoryID' => $categoryid,
                'inPrice' => (float) $inprice,
                'outPrice' => (float) $outprice,
                'inStock' => (int) $instock,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'image' => $newImageURL,
            ],
        ]);
    }
    // xy ly luu xuong db
    return redirect('/admin/manageProduct');
});

// check user da ton tai hay chua
// neu da ton tai -> return true
// else return false
Route::get('/validateUser/{inputUsername}', function ($inputUsername) {
    $data = DB::table('users')
        ->where('username', $inputUsername)
        ->count();
    return $data;
});


// get all category name
Route::get('/category','ProductController@getAllCategory');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

