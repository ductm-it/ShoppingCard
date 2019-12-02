@extends('layouts.full')
@section('content')
<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy container">
        
    <!-- product -->
    <div class="" aria-labelledby="">
        <div class="beta-products-list">
            <h4>Tìm Kiếm</h4>
            <p class="pull-left">Tìm thấy {{count($shoes)}} sản phẩm</p>
            <div class="clearfix8"></div>
        </div>
            @foreach($shoes as $item)
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="{{$item->image}}" alt="" class="pro-image-front">
                        <img src="{{$item->image}}" alt="" class="pro-image-back">
                    </div>
                    <div class="item-info-product ">
                        <h4><a href="#">{{$item->name}}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">{{$item->outPrice}}</span>
                        </div>
                        <a  onclick="addToCart({{$item->id}})" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach

        <div class="clearfix"></div>
    </div>
    <!-- end product -->

    <!-- end bottom pagination -->
</div>
@endsection