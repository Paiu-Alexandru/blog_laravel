
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('backend/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />


  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('backend/assets/css/sleek.css')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



  <!-- FAVICON -->
  <link href="{{ asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('backend/assets/plugins/nprogress/nprogress.js')}}"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
  <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5 p-2">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card shadow p-3 mb-5 bg-body rounded">

            @if(session('success'))
                <div class="alert alert-info alert-dismissible fade show p-1" role="alert">
                    <p> {{ session('success') }}</p>
                </div>
                @endif
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Register</h4>
              <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="row">
                        <div class="form-group ">
                        <label class="text-muted">Name</label>
                            <input type="text" name="name" class="form-control input-lg"    >
                            @error('name')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group ">
                        <label class="text-muted">Email</label>
                            <input type="email"  name="email" class="form-control input-lg"    >
                            @error('email')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="text-muted">Password</label>
                            <input type="password" name="password" id="password" class="form-control" >
                            @error('password')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label class="text-muted">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                            @error('password_confirmation')
                                <label class=" text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex my-2 justify-content-between">
                            <div class="d-inline-block mr-3">
                                <label class="control control-checkbox">Remember me
                                <input type="checkbox" name="remember"/>
                                <div class="control-indicator"></div>
                                </label>

                            </div>

                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                            <p>Already have an account?
                            <a class="text-blue" href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                        </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; Paiu Alexandru Dashboard Bootstrap Template by
          <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
        </p>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
