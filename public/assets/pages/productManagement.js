let selectedIdProduct=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function  setIdProduct(id){
    selectedIdProduct=id;
    console.log(selectedIdProduct,'selected product')
}
//show image when chose input file
var loadFileImageProduct = function(event) {
    var image = document.getElementById('product-avatar');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
function confirmDeleteProduct(){
    
    $.ajax({
        url: `/api/admin/product/${selectedIdProduct}`,
        type: 'DELETE',
        success: function(result) {
            location.reload();
        }
    });
}

const viewDetailProduct = (productid) => {
    
    selectedIdProduct = productid;
    
    $.get(`/api/product/${selectedIdProduct}`, (data, status) => {

        let {
            id,
            name,
            description,
            categoryName,
            categoryID,
            image,
            inPrice,
            outPrice,
            inStock,
            created_at,
            updated_at
        }
            = data[0]

        inPrice = inPrice.replace('.00000', '')
        outPrice = outPrice.replace('.00000', '')

        $('#ProductID').val(id)
        $('#ProductIDLablel').val(id)
        $('#ProductName').val(name)
        $('#ProductDescription').val(description)
        $('#selectedCate').text(categoryName)
        $('#selectedCate').attr('value',categoryID)
        $('#inprice').val(inPrice)
        $('#outprice').val(outPrice)
        $('#instock').val(inStock)
        $('#createdat').val(created_at)
        $('#updatedat').val(updated_at)
        if (image) {
            $('#product-avatar').attr('src', `/${image}`)
        }else{
            $('#product-avatar').attr('src', '/images/avatar.png')
        }
    });
}

// $('#btnUpdateProduct').click(function (e) {
//     let ProductID=$('#ProductID').text()
//     let ProductName = $('#ProductName').text()
//     let ProductDescription = $('#ProductDescription').text()
//     let selectedCate = $('#selectedCate').text()
//     let inprice = $('#inprice').text()
//     let outprice = $('#outprice').text()
//     let instock = $('#instock').text()
//     let createdat = $('#createdat').text()
//     let updatedat = $('#updatedat').text()
//     console.log(ProductName,'product name')

//     // format date before submit to server
//     let Arrcreatedat = createdat.split('/')
//     let FormatArrcreatedat = createdat.split('-')
//     let ArrUpdatedat = updatedat.split('/')
//     let FormatUpdatedat = updatedat.split('-')
//     if (Arrcreatedat.length > 1) {
//         createdat = `${Arrcreatedat[1]}/${Arrcreatedat[0]}/${Arrcreatedat[2]}`
//     }
//     if (FormatArrcreatedat.length > 1) {
//         createdat = `${FormatArrcreatedat[1]}/${FormatArrcreatedat[2]}/${FormatArrcreatedat[0]}`
//     }
//     if (ArrUpdatedat.length > 1) {
//         updatedat = `${ArrUpdatedat[1]}/${ArrUpdatedat[0]}/${ArrUpdatedat[2]}`
//     }
//     if (FormatArrcreatedat.length > 1) {
//         updatedat = `${FormatUpdatedat[1]}/${FormatUpdatedat[2]}/${FormatUpdatedat[0]}`
//     }

//     //stop submit the form, we will post it manually.
//     e.preventDefault();
//     // Get form
//     var form = $('#fileUploadForm')[0];

//     // Create an FormData object 
//     var data = new FormData(form);
//     let fileData=$('#file').prop('files')[0]
//     // append others fields
//     data.append('', username)
//     data.append('fullname', fullname)
//     data.append('address', address)
//     data.append('email', email)
//     data.append('role', role)
//     data.append('dob', dob)
//     data.append('file',fileData)
//     // disabled the submit button
//     $("#btnSubmitUpdate").prop("disabled", true);
//     $.ajax({
//         type: "POST",
//         enctype: 'multipart/form-data',
//         url: `/api/user/${selectedIdStaff}`,
//         data: data,
//         processData: false,
//         contentType: false,
//         cache: false,
//         timeout: 600000,
//         success: function (data) {
//             $("#btnSubmitUpdate").prop("disabled", false);
//             location.reload()
//         },
//         error: function (e) {

//             $("#btnSubmitUpdate").prop("disabled", false);
//         }
//     });
// })