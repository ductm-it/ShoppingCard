$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const addToCart = (id) => {
    
    $.post("/cart",
        {
            product_id: id
        },
        function (data, status) {
            // extract data from response
            let {total,count,selectedProductName}=data
            // format
            total=total.replace('.00','')
            // display total, count
            $('#cart-total').text(total)
            $('#simpleCart_quantity').text(count)
            // show added item on alert box
            swal(
                {
                    title: `Added ${selectedProductName} to cart`,
                    type: 'success',
                    confirmButtonColor: '#4fa7f3'
                }
            )
        });
}