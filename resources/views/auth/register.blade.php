<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Library | Registration</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid mt-10" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Register</p>
                        </div>
                        <!-- Username input -->
                        <div class="mb-3">
                            <input type="text" name="username" id="username" class="form-control form-control-lg"
                                placeholder="Enter username">
                            <div class="mt-2"></div>
                        </div>
                        <!-- Password input -->
                        <div class="mb-3">
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg" placeholder="Enter password">
                            <div class="mt-2"></div>
                        </div>
                        <!-- Confirm Password input -->
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" id="con"
                                class="form-control form-control-lg" placeholder="Confirm password">
                            <div class="mt-2"></div>
                        </div>
                        <!-- Email input -->
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="Enter email address">
                            <div class="mt-2"></div>
                        </div>
                        <!-- Full Name input -->
                        <div class="mb-3">
                            <input type="text" name="name_lengkap" class="form-control form-control-lg"
                                placeholder="Enter full name">
                            <div class="mt-2"></div>
                        </div>
                        <!-- Alamat input -->
                        <div class="mb-3">
                            <input type="text" name="alamat" class="form-control form-control-lg"
                                placeholder="Enter address">
                            <div class="mt-2"></div>
                        </div>
                        <div class="row">
                            <div class="col mb-2 mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3">Already have an account? <a href="{{ url('login') }}"
                            class="link-primary">Login</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
