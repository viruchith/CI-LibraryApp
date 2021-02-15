<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        .contact-clean,
        .login-clean {
            background: #f1f7fc;
            padding: 80px 0
        }

        .contact-clean form {
            max-width: 480px;
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 4px;
            color: #505e6c;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, .1)
        }

        @media (max-width:767px) {
            .contact-clean {
                padding: 20px 0
            }

            .contact-clean form {
                padding: 30px
            }
        }

        .contact-clean h2 {
            margin-top: 5px;
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 36px;
            color: inherit
        }

        .contact-clean .form-group:last-child {
            margin-bottom: 5px
        }

        .contact-clean form .form-control {
            background: #fff;
            border-radius: 2px;
            box-shadow: 1px 1px 1px rgba(0, 0, 0, .05);
            outline: 0;
            color: inherit;
            padding-left: 12px;
            height: 42px
        }

        .contact-clean form .form-control:focus {
            border: 1px solid #b2b2b2
        }

        .contact-clean form textarea.form-control {
            min-height: 100px;
            max-height: 260px;
            padding-top: 10px;
            resize: vertical
        }

        .contact-clean form .btn {
            padding: 16px 32px;
            border: none;
            background: 0 0;
            box-shadow: none;
            text-shadow: none;
            opacity: .9;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: .4px;
            line-height: 1;
            outline: 0 !important
        }

        .contact-clean form .btn:hover {
            opacity: 1
        }

        .contact-clean form .btn:active,
        .login-clean form .btn-primary:active {
            transform: translateY(1px)
        }

        .contact-clean form .btn-primary {
            background-color: #055ada !important;
            margin-top: 15px;
            color: #fff
        }

        .login-clean form {
            max-width: 320px;
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 4px;
            color: #505e6c;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, .1)
        }

        .login-clean .illustration {
            text-align: center;
            padding: 0 0 20px;
            font-size: 100px;
            color: #f4476b
        }

        .login-clean form .form-control {
            background: #f7f9fc;
            border: none;
            border-bottom: 1px solid #dfe7f1;
            border-radius: 0;
            box-shadow: none;
            outline: 0;
            color: inherit;
            text-indent: 8px;
            height: 42px
        }

        .login-clean form .btn-primary {
            background: #f4476b;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: 0 !important
        }

        .login-clean form .btn-primary:active,
        .login-clean form .btn-primary:hover {
            background: #eb3b60
        }

        .login-clean form .forgot {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: .9;
            text-decoration: none
        }

        .login-clean form .forgot:active,
        .login-clean form .forgot:hover {
            opacity: 1;
            text-decoration: none
        }
    </style>
</head>

<body>
    <!-- Start: Login Form Clean -->
    <div class="login-clean">
        <form id="admin-reset" method="POST" action="/admin/changepassword" style="background: rgb(255,255,255);" onsubmit="return validateForm()">
            <h2 class="sr-only">Change Password</h2>
            <div id="alert-container"></div>
            <div class="illustration"><i class="icon ion-lock-combination" style="color: rgb(0,0,0);"></i></div>
            <div class="form-group">
                <input id="currentpassword" class="border-primary shadow form-control rubberBand animated" type="password" data-toggle="tooltip" data-bs-tooltip="" name="currentpassword" placeholder="Current Password" required title="Your Current Password">
            </div>
            <div class="form-group">
                <input id="newpassword" class="border-primary shadow form-control rubberBand animated" type="password" data-toggle="tooltip" data-bs-tooltip="" name="newpassword" placeholder="New Password" required title="Your New Password">
            </div>
            <div class="form-group">
                <input id="retypepassword" class="border-primary shadow form-control rubberBand animated" type="password" data-toggle="tooltip" data-bs-tooltip="" name="retypepassword" placeholder="Retype Password" required title="Retype New Password">
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block border rounded-pill shadow wobble animated" type="submit" style="color: var(--light);background: var(--blue);">Change Password</button></div>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div><!-- End: Login Form Clean -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready((function() {
            $("[data-bs-tooltip]").tooltip()
        }));

        function validateForm() {
            if ($("#password").val() == $("#retypepassword").val()) {
                return true;
            } else {
                alert("Passwords donot match !");
                return false;
            }
        }
    </script>
</body>

</html>