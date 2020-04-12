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

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Order Successfully done!</h4>
                <p>Sir! You have successfully made your order.</p>
                <p>Your Payment Method is :<b> {{$method}}</b></p>
                <p>We will contuct you soon........</p>
                <hr>
                <p class="mb-0">Thank You for being with us!</p>
            </div>




        </div>
    </section> <!--/#cart_items-->

@endsection
