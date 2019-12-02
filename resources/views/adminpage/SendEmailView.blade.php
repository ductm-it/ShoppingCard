@extends('layouts.full')

@section('content')

<!-- //banner -->
<!-- check out -->
<div class="checkout">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <form action="/sendemail/send" enctype="multipart/form-data" method="POST" id="sendemail">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your Address"
                            name="address">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                        <button type="submit" class="btn btn-warning btn-rounded w-md waves-effect waves-light m-b-7">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="table-responsive checkout-right animated wow slideInUp" class="col" data-wow-delay=".5s">
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

                                        <div class="entry value"><span id="amount-{{$item->id}}">{{$item->qty}}</span>
                                        </div>

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
            </div>

        </div>




    </div>
</div>
<!-- //check out -->
@endsection