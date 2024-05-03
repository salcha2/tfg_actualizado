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
        <div class="row justify-content-center wrapper" id="register-box">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold text-primary mb-4">Create Account</h1>
                        <form action="#" method="post" class="px-3" id="register-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="remail" name="email" placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" id="rpassword" placeholder="Password" required minlength="5">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required minlength="5">
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card justify-content-center rounded-right myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
                    <hr class="my-3 bg-light myHr">
                    <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
                    <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
