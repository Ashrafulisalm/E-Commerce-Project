@extends('layouts.Short_home')

@section('container')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->




        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form action="{{url('/shipping')}}" method="post">
                                @csrf
                                <input type="text" name="customer_first_name" placeholder="First Name *">
                                <input type="text" name="customer_last_name" placeholder="Last Name *">
                                <input type="text" name="customer_email" placeholder="Email *">
                                <input type="text" name="customer_phone" placeholder="Phone Number *">

                                <select name="customer_city">
                                    <option>Select City *</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Narayenganj">Narayenganj</option>
                                    <option value="Gazipur">Gazipur</option>
                                    <option value="Tangail">Tangail</option>
                                    <option value="Cumilla">Cumilla</option>
                                    <option value="Maymenshing">Maymenshing</option>
                                    <option value="Jamalpur">Jamalpur</option>
                                    <option value="Savar">Savar</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Khulna">Khulna</option>
                                </select><br>
                                <input type="text" name="customer_address" placeholder="Address *">
                                <input type="submit" class="btn btn-default">

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div><br>


        <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
            <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
            <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
        </div>
    </div>
</section> <!--/#cart_items-->

    @endsection
