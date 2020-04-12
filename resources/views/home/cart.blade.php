@extends('layouts.Short_home')
@section('container')

    <section id="cart_items" >
        <div class="container" >
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $cart=\Cart::getContent();
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="quantity">Quantity</td>
                        <td class="price">Price</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $row)
                    <tr><td class="cart_product">
                            <a href=""><img src="{{URL::to($row->attributes->image)}}"  height="80" width="80" alt=""></a>
                        </td>

                        <td class="cart_description">
                            <h4><a href="">{{$row->name}}</a></h4>

                        </td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <table><tr><th>
                                <form action="{{url('/increaseqty')}}" method="post">
                                    @csrf
                                    <input class="cart_quantity_input" type="hidden" name="quantity" value="{{$row->quantity}}" autocomplete="off" size="2">
                                    <input class="cart_quantity_input" type="hidden" name="rowId" value="{{$row->id}}" autocomplete="off" size="2">
                                    <input type="submit" name="submit" value="+" class="btn btn-sm btn-default"  >
                                </form></th><th>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$row->quantity}}" autocomplete="off" size="2">
                                        </th><th>
                                <form action="{{url('/decreaseqty')}}" method="post">
                                    @csrf
                                    <input class="cart_quantity_input" type="hidden" name="quantity" value="{{$row->quantity}}" autocomplete="off" size="2">
                                    <input class="cart_quantity_input" type="hidden" name="rowId" value="{{$row->id}}" autocomplete="off" size="2">
                                    <input type="submit" name="submit" value="-" class="btn btn-sm btn-default"  >
                                </form></th>
                                    </tr></table>
                            </div>
                        </td>
                        <td class="cart_price">
                            <p>{{$row->price}} tk</p>
                        </td>


                        <td class="cart_total">
                            <p class="cart_total_price">{{\Cart::get($row->id)->getPriceSum()}} tk</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/removecart/'.$row->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>


                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::getSubTotal()}}</span></li>
                            <li>Eco Tax <span>0%</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::getTotal()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <?php
                        $customer=Session::get('customer_id');
                        $shiping=Session::get('shiping_id');
                        $customer1=Session::get('customer_name');
                        ?>
                        @if($customer!= null && $shiping==null )
                        <a class="btn btn-default check_out" href="{{ url('/checkout') }}">Check Out</a>
                            @elseif($customer!= null && $shiping!=null)
                            <a class="btn btn-default check_out" href="{{ url('/payment') }}">Check Out</a>
                            @else
                            <a class="btn btn-default check_out" href="{{ url('/login_check') }}">Check Out</a>
                        @endif
                    </div>
                </div>

        </div>
    </section><!--/#do_action-->

    @endsection