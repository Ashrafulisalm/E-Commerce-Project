@extends('layouts.Short_home')
@section('container')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">


                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->

                        <h2>If you have an account with us, please log in.</h2>
                        <form action="{{url('/customer_login1')}}" method="post">
                            @csrf
                            <p class="alert-danger">
                                <?php
                                $message=Session::get('msgg');
                                if($message){
                                    echo $message;
                                    Session::put('msgg',null);
                                }

                                ?>
                            </p>


                            <input type="text" name="customer_email" placeholder="Email Address" />

                            <input type="password" name="customer_password" placeholder="Password" />


                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{url('/customer_register1')}}" method="post">
                            @csrf
                            <input type="text" placeholder="Name" name="customer_name"/>
                            <input type="email" placeholder="Email Address" name="customer_email"/>
                            <input type="text"  placeholder="Mobile Number"  name="customer_phone"/>
                            <input type="password" placeholder="Password" name="customer_password"/>

                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->


@endsection