@extends('layouts.full')

@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			@if(count($cart))
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
				</thead>
				@foreach ($cart as $item)

				<tr class="rem1">
					<td class="invert-image">
						<a href="#">
							<img @if($item->options && $item->options->image)
							src="{{$item->options->image}}"
							@else
							src='{{('/images/no-image.png')}}'
							@endif
							alt=" " class="img-responsive" />
						</a>
					</td>
					<td class="invert">
						<div class="quantity">
							<div class="quantity-select">
								<a onclick="decreaseItem({{$item->id}})" class="entry value-minus">&nbsp;</a>
								<div class="entry value"><span id="amount-{{$item->id}}">{{$item->qty}}</span></div>
								<a onclick="increaseItem({{$item->id}})" class="entry value-plus active">&nbsp;</a>
							</div>
						</div>
					</td>
					<td class="invert">{{$item->name}}</td>
					<td id="price-{{$item->id}}" class="invert">{{$item->subtotal}} VND</td>
				</tr>
				@endforeach
				<tfoot>
					<tr>
						<th colspan="3">Total</th>
						<th id="bill-total">{{Cart::subtotal()}} VND</th>
					</tr>
				</tfoot>
				@else
				<p>You have no items in the shopping cart</p>
				@endif

			</table>
		</div>
		&nbsp;
		<div class="row">

			<div class="col-sm-6">
				<a href="/" class=" btn btn-info" aria-hidden="true">Back To Shopping</a>
			</div>
			<div class="col-sm-6 text-right">

				<a href="sendemail" class="btn btn-info" role="button">Continue</a>


			</div>
		</div>
	</div>
</div>
<!-- //check out -->
@endsection