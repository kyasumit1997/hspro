<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Stylish Login Form Design | Smarteyeapps.com</title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/login/images/fav.png')}}">
    <link rel="stylesheet" href="{{asset('assets/login/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/login/css/style.css')}}">
</head>
<body>
    <div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                            <h1>Awesome Login Page Design</h1>
                            <p>Please use your credentials to login.
                                If you are not a member, please register. </p>
                        </div>
                        <div class="col-md-7 logn-part">
                          <div class="row">
                              <div class="col-lg-10 col-md-12 mx-auto">
                                  <div class="logo-cover">
                                       <img src="assets/images/logo.png" alt="">
                                   </div>
                                    <div class="form-cover">
                                        <h6>Login Here</h6>
                                        <form action="{{route('Doctors/Login/checkAuth')}}" method="post">
                                            @csrf
                                         <input placeholder="Enter Username" type="text" name="username" class="form-control">
                                         @error('username') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
                                         <input Placeholder="Enter PAssword" type="password" name="password" class="form-control">
                                         @error('password') <div class="alert alert-danger">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    </div>
                  @enderror
                                         <div class="row form-footer">
                                             <div class="col-md-6 button-div">
                                                 <button class="btn btn-primary">Login</button>
                                             </div>
                                        </form>
                                         </div>
                                    </div>
                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{asset('assets/login/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/login/js/popper.min.js')}}"></script>
<script src="{{asset('assets/login/js/bootstrap.min.js')}}"></script>
</html>