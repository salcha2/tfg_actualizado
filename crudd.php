<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap');
</style>

    <style>
        /* Estilos personalizados */
        .myColor {
            background-color: #007bff; /* Color de fondo personalizado */
        }

        .card {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold text-primary mb-4">Sign in to Account</h1>
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember me</label>
                                </div>
                                <div class="forgot">
                                    <a href="#" id="forgot-link">Forgot Password</a>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Sign-In" id="login-btn" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
                    <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#register-link").click(function(){
                $("#login-box").hide();
                $("#register-box").show();
            });
        });
    </script>
</body>
</html>
