<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://static-zmp3.zadn.vn/skins/zmp3-v5.2/images/icon_zing_mp3_60.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/signing.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="vh-100 gradient-custom">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">đăng nhập</h2>
                                <p class="text-white-50 mb-5 fs-4">Hãy nhập email và mật khẩu của bạn!</p>

                                <?php require './admin/error_success.php' ?>

                                <form action="process_signin.php" method="post">
                                    <div class="text-start">
                                        <input onchange="input_active()" type="email" name="email" id="email" class="form__input form-control form-control-lg" autocomplete="off"/>
                                        <span id="error_email" class="error_input"></span>
                                        <label class="form__label form-label fs-4" for="email">Email</label>
                                    </div>
                
                                    <div class="text-start">
                                        <input onchange="input_active()" type="password" name="password" id="password" class="form__input form-control form-control-lg" />
                                        <span id="error_password" class="error_input"></span>
                                        <label class="form__label form-label fs-4" for="password">Mật khẩu</label>
                                    </div>

                                    <div class="form__check mb-4 text-start">
                                        <label class="fs-4" for="remember">Ghi nhớ đăng nhập</label>
                                        <input type="checkbox" id="remember" name="remember" class="form__check-input" />
                                    </div>
                
                                    <button class="btn btn-outline-light btn-lg px-5 fs-4" type="submit" onclick="return signin_validate()">Đăng nhập</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0 fs-4">Bạn không có tài khoản? <a href="signup.php" class="text-white-50 fw-bold">Đăng ký</a></p>
                            </div>
                        </div>
                    </div>
                
            </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./assets/js/signing.js"></script>
</html>