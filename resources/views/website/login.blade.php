<?php
if (session()->has('ses_userid')) {
  echo "<script>window.location='/';</script>";
}
?>

@extends('website.layout.main_structure')

@section('main_code')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Login With Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                </ol>
            </nav>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
    <!-- Page Header End -->
<form action="{{url('/login_auth')}}" method="post">
@csrf
  <div class="container">
    <label><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" value="{{old('email')}}" required><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="{{old('password')}}" required>
        


    <button type="submit" name="submit" value="submit">Login</button>
    <h5 align='center' class='pt-3 pb-3'>
      If You'r Not Register <a href='signup'>Sign Up Here</a>
    </h5>
    
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
  <span class="psw">Forgot <a href="forgotpass">password?</a></span>

  <!-- <div class="container" style="background-color:#f1f1f1"> -->
    <!-- <button type="button" class="cancelbtn">Cancel</button> -->
  <!-- </div> -->
  
</form>
</body>
</html>


@endsection