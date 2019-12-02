@extends('layouts.homepage')
@section('content')
<!-- banner -->
<div class="banner-grid container">
    <div id="visual">
        <div class="slide-visual">
            <!-- Slide Image Area (1000 x 424) -->
            <ul class="slide-group">
                <li><img class="img-responsive" src="{{asset('/images/ba1.jpg')}}" alt="Dummy Image" /></li>
                <li><img class="img-responsive" src="{{asset('/images/ba2.jpg')}}" alt="Dummy Image" /></li>
                <li><img class="img-responsive" src="{{asset('/images/ba3.jpg')}}" alt="Dummy Image" /></li>
            </ul>

            <!-- Slide Description Image Area (316 x 328) -->
            <div class="script-wrap">
                <ul class="script-group">
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="{{asset('/images/baa1.jpg')}}" alt="Dummy Image" />
                        </div>
                    </li>
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="{{asset('/images/baa2.jpg')}}" alt="Dummy Image" />
                        </div>
                    </li>
                    <li>
                        <div class="inner-script"><img class="img-responsive" src="{{asset('/images/baa3.jpg')}}" alt="Dummy Image" />
                        </div>
                    </li>
                </ul>
                <div class="slide-controller">
                    <a href="#" class="btn-prev"><img src="{{asset('/images/btn_prev.png')}}" alt="Prev Slide" /></a>
                    <a href="#" class="btn-play"><img src="{{asset('/images/btn_play.png')}}" alt="Start Slide" /></a>
                    <a href="#" class="btn-pause"><img src="{{asset('/images/btn_pause.png')}}" alt="Pause Slide" /></a>
                    <a href="#" class="btn-next"><img src="{{asset('/images/btn_next.png')}}" alt="Next Slide" /></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript" src="{{asset('/js/pignose.layerslider.js')}}"></script>
    <script type="text/javascript">
        //<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
    </script>

</div>
<!-- //banner -->



<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy container">
        
    <!-- product -->
    <div class="" aria-labelledby="">
        @foreach($data as $item)
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
    <!-- bottom pagination -->
    <div class="row">
        <div class="col-xs-12 center-block text-center">
                <nav>
                        <ul class="pagination pagination-split">
                            <li class="page-item">
                                <a class="page-link" href="{{$data->previousPageUrl()}}" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===1) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(1)}}">1</a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===2) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(2)}}">2</a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===3) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(3)}}">3</a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===4) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(4)}}">4</a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===5) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(5)}}">5</a>
                            </li>
                            <li class="page-item 
                                @if($data->currentPage()===6) 
                                active 
                                @endif">
                                <a class="page-link" href="{{$data->url(6)}}">6</a>
                            </li>
                            
                            <li class="page-item">
                                <a class="page-link" href="{{$data->nextPageUrl()}}" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
        </div>
    </div>
    <!-- end bottom pagination -->
</div>
    

@endsection