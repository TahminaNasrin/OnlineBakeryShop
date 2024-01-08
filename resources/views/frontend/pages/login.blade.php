@extends('frontend.master')
@section('login')
<div class="container-xxl bg-light my-6 py-6 pt-0">
  <!DOCTYPE html>
  <html lang="en">

  <!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="{{url('Backend/')}}/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head> -->

  <body>
    <!-- <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 white text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your email and password!</p>


              <form action="{{route('customer.login.post')}}" method="post" autocomplete="off">
                @csrf

              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
                <label class="form-label" for="typeEmailX">Email</label>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>


              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" required />
                <label class="form-label" for="typePasswordX">Password</label>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
    <section class="vh-100" style="background-color: grey;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn5KIFeBXwk0neUGQS4-KeO2oJN14igpJJNw&usqp=CAU" style="width: 400px; height:500px;" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">



                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">LogIn Page</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log into your account</h5>


                    <form action="{{route('customer.login.post')}}" method="post" autocomplete="off">
                      @csrf


                      <div class="form-outline mb-4">
                        <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" required />
                        <label class="form-label" for="form2Example17">Email address</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" required />
                        <label class="form-label" for="form2Example27">Password</label>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>
                      <div>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('customer.registration')}}" style="color: #393f81;">Register here</a></p>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>

  </html>
</div>
@endsection