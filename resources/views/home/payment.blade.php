@extends('layouts.Short_home')

@section('container')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Payment</li>
                </ol>
            </div><!--/breadcrums-->





            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div><br>

            <form action="{{url('/success')}}" method="post" >
                @csrf
            <div >

                <input type="radio" name="payment_getway" value="cash">  Cash on Delivary<br>
                <input type="radio" name="payment_getway" value="card">  Debit Card<br>
                <input type="radio" name="payment_getway" value="bkash">  bKash<br>
                <input type="submit" value="submit" class="btn btn-success">

            </div>
            </form>
        </div>
    </section> <!--/#cart_items-->

@endsection
