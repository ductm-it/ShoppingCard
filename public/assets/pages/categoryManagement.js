let selectedIdCate=''
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function setIdCate(id){
    selectedIdCate=id;
}
function confirmDeleteCate(){
    console.log('test confirmDeleteUser')
    $.ajax({
        url:`/api/admin/cate/${selectedIdCate}`,
        type:'DELETE',
        success: function(result){
            location.reload();
        }
    });
}
const viewDetailCate=(cateid)=>{
    selectedIdCate1=cateid;
    $.get(`/api/cate/${selectedIdCate1}`,(data,status)=>{
        let{id,
            categoryName,
            created_at,
            updated_at,
         }
         = data[0] 
        // console.log( id,'id')
        $('#CateIDLablel').val(id)
        $('#cateid').val(id)
        $('#catename').val(categoryName)
        $('#createdatcate').val(created_at)
        $('#updatedatcate').val(updated_at)
    });
}

$('#categorynameAdd').on('input',function(e){
    var getCatename=$('#categorynameAdd').val();
     console.log(getCatename,'test');
     $.get(`/api/validateCatename/${getCatename}`,(data,status) =>{
         $result2=data;
         console.log($result2,'result')
                 if($result2!=0){
                     $('#trungcate').show();
                 }
                 else{
                     $('#trungcate').hide();
                 }
     });
 }); 
 function getCountCateName(test){
    var GetCatename=$('#categorynameAdd').val();

    // $.ajax({
    //     url:`/api/validateUser/${GetUsername}`,
    //     async: false,
    //     success:function(data){
    //         test(data);
    //         console.log(data,'test test')

    //     }
    // });
    $.extend({
        xResponse: function(url, data) {
            // local var
            var theResponse = null;
            // jQuery ajax
            $.ajax({
                url:`/api/validateCatename/${GetCatename}`,
                type: 'GET',
                data: data,
                // dataType: "html",
                async: false,
                success: function(respText) {
                    theResponse = respText;
                }
            });
            // Return the response text
            return theResponse;
        }
    });
    var xData = $.xResponse(`/api/validateCatename/${GetCatename}`, {issession: 1,selector: true});
    return xData;
}
// gọi hàm onsubmit
 function validateCateName(f){
    var x = getCountCateName();
    // console.log(x,'xxxxxx')
    if(x!=0){
        return false;
    }
    else{
        return true;
    }
  
}