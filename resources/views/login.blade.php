@extends('index')
@section('title')
HomePage
@endsection
@section('page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<section class="vh-100">
<div class="p-5 bg-image" style="
        height: 300px;
        "></div>


  <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        border:none;
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center" style="background-color:white;">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <div class="heading">
        <h2>Login Page</h2>
        </div>
      

        <form id="loginForm" action="/logvalidated" method="POST">
      @csrf
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
             name="email" placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
             name="password" placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>
          @if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
 </div>
@endif
          <div class="d-flex justify-content-between align-items-center">
         
         
            <a href="/forgotview" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/reg"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0"> 
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fa-brands fa-facebook"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
      </div>
      </div>
      </div>
</div>
</section>
@endsection
