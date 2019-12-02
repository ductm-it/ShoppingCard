$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const increaseItem=id=>{
    $.get(`/increaseCartItem/${id}`, function(data, status){
        let {qty,id,image,subtotal,totalAll,countAll}=data
        console.log(countAll,'countAllcountAll')
        $(`#amount-${id}`).text(qty)
        $(`#price-${id}`).text(subtotal+" VND")
        $('#bill-total').text(totalAll)
        $('#simpleCart_quantity').text(countAll)
        $('#cart-total').text(totalAll)
      });
}
const decreaseItem=id=>{
    $.get(`/decreaseCartItem/${id}`, function(data, status){
        let {qty,id,image,subtotal,totalAll,countAll}=data
        if(qty<=0){
            $(`#price-${id}`).parent().remove()
        }else{
            console.log(countAll,'countAllcountAll')
            $(`#amount-${id}`).text(qty)
            $(`#price-${id}`).text(subtotal+" VND")
            $('#bill-total').text(totalAll)
            $('#simpleCart_quantity').text(countAll)
            $('#cart-total').text(totalAll)
        }
        
      });
}