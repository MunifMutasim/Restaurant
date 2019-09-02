<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title></title>
    <!-- Icons-->
    <link href="{{ asset('backend') }}/css/coreui-icons.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/flag-icon.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script src="{{ asset('backend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/js/popper.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/js/pace.min.js"></script>
    <script src="{{ asset('backend') }}/js/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('backend') }}/js/coreui.min.js"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>

  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                  
                
                  @if (\Session::has('invalid_login'))
                    <div id="alert" class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ session('invalid_login') }}</strong>
                    </div>
                  @endif

                  @if (\Session::has('logout_msg'))
                    <div id="alert" class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ session('logout_msg') }}</strong>
                    </div>
                  @endif

                  @if (\Session::has('not_admin'))
                    <div id="alert" class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ session('not_admin') }}</strong>
                    </div>
                  @endif
                  
                <form action="" method="post">
                @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        <input name="email" id="email" class="form-control" type="email" placeholder="Email">
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        <input name="password" id="password" class="form-control" type="password" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary px-4" type="Submit">Login</button>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-link px-0" type="button">Forgot password?</button>
                        </div>
                    </div>
                </form>

              </div>
            </div>
            {{-- <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
  </body>
</html>

