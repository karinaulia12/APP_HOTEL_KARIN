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
                    <div class="card-body">
                        <div class="text-center m-auto mt-3 mb-4">
                            <h6 class=" text-center display-6">Login Petugas <br>AuHotelia</h6>
                        </div>

                        <div class="mx-4">
                            <form action="/petugas/login" method="post">
                                <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
                                <div class="form-group mb-3">
                                    <!-- <label for="emailaddress">Email </label> -->
                                    <input type="text" name="username" placeholder="Username" class="form-control rounded-pill py-3" autofocus required="">
                                </div>
                                <div class="form-group mb-3">
                                    <!-- <label for="password">Password</label> -->
                                    <!-- <div class="input-group bg-light" id="show_hide_password"> -->
                                    <input type="password" class="form-control rounded-pill py-3" id="password" name="password" placeholder="Password" required="">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-lg fa-eye" style="padding-top: 10px; padding-left: 10px; padding-right: 10px;" aria-hidden="true"></i></a>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox checkbox-success">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block rounded-pill col-6 mb-3" type="submit" name="submit"> Log In </button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>

</body>

</html>