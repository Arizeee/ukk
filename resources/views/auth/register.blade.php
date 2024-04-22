<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Library | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="{{ route('register') }}" method="post">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <!-- Username input -->
            <div data-mdb-input-init class="form-outline mb-2">
              <label class="form-label" for="form1Example13">Username</label>
              <input type="username" placeholder="your username here" id="form1Example13" name="username" class="form-control form-control-lg" />
            </div>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-2">
              <label class="form-label" for="form1Example13">Email address</label>
              <input type="email" placeholder="your email here" id="form1Example13" name="email" class="form-control form-control-lg" />
            </div>
            <!-- Nama Lengkap input -->
            <div data-mdb-input-init class="form-outline mb-2">
              <label class="form-label" for="form1Example13">Nama Lengkap</label>
              <input type="name_lengkap" placeholder="your full name here" id="form1Example13" name="name_lengkap" class="form-control form-control-lg" />
            </div>
            <!-- Nama Lengkap input -->
            <div data-mdb-input-init class="form-outline mb-2">
              <label class="form-label" for="form1Example13">Alamat</label>
              <input type="alamat" placeholder="your address here" id="form1Example13" name="alamat" class="form-control form-control-lg" />
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-2">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" placeholder="your password here" name="password" id="form1Example23" class="form-control form-control-lg" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="form1Example23">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="con"
                    class="form-control form-control-lg" placeholder="Confirm password">
                <div class="mt-2"></div>
            </div>
            <div class="d-grid gap-2 mt-4">
              {{-- <button class="btn btn-primary" type="button" data-mdb-ripple-init>Button</button> --}}
              <button class="btn btn-primary" type="submit" data-mdb-ripple-init>Register</button>
            </div>
            <div class="py-4 d-flex">
              <p class="px-2">Sudah punya akun? </p>
              <a href="/login">Login here</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
