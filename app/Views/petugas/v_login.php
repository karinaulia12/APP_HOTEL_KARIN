<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <div class="container mt-5 pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="card mt-4">
                    <div class="card-body my-3">
                        <div class="text-center m-auto mb-3">
                            <h6 class=" text-center display-6">Login Petugas AuHotelia</h6>
                            <?php if (session()->getFlashdata('salahLogin')) : ?>
                                <div class="alert text-center m-auto my-3 col-10 alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <?= session()->getFlashdata('salahLogin'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mx-4">
                            <form action="/petugas/login" method="post">
                                <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
                                <div class="form-group mb-3 mt-5">
                                    <input type="text" name="username" placeholder="Username" class="form-control rounded-pill py-3" autofocus required="">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control rounded-pill py-3" id="password" name="password" placeholder="Password" required="">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-lg fa-eye" style="padding-top: 10px; padding-left: 10px; padding-right: 10px;" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> -->
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block rounded-pill col-6 mb-3" type="submit" name="submit"> Log In </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>

</body>

</html>