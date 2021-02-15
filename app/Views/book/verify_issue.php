<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Verify Issue</title>
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
        <form id="issue-verify" method="POST" action="<?= base_url('/verify/issue/' . $issue_id) ?>" style="background: rgb(255,255,255);">
            <h2 class="sr-only">Verify Issue</h2>
            <h5>Book Ref Num : <a href="#" target="_blank" rel="noopener noreferrer"><?= $book_ref_num ?></a></h5>
            <h5>Book Title : <?= $book_title ?></h5>
            <h5>Book Author : <?= $book_author ?></h5>
            <h5>Member Id : <?= $member_id ?></h5>
            <h5>Member Name : <?= $member_name ?></h5>
            <h5>Member Email : <?= $member_email ?></h5>
            <h5>Member Mobile : <?= $member_mobile ?></h5>
            <h5>Member Role : <?= $member_role ?></h5>
            <br>
            <div id="alert-container"></div>
            <div class="illustration"><i class="icon ion-android-mail" style="color: rgb(0,0,0);"></i></div>
            <input type="hidden" name="issue_id" value="<?= $issue_id ?>">
            <div class="form-group">
                <input class="border-primary shadow form-control rubberBand animated" type="text" name="otp" id="otp" placeholder="OTP" pattern="[0-9]{6}" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" minlength="2" maxlength="50" title="OTP">
            </div>
            <div class="form-group"><button name="verify-otp" value="true" class="btn btn-primary btn-block border rounded-pill shadow wobble animated" type="submit" style="color: var(--light);background: var(--blue);">Verify OTP</button></div>
            <div class="form-group">
                <input class="border-primary shadow form-control rubberBand animated" type="text" name="pin" id="pin" placeholder="Admin's Pin" pattern="[0-9]{4}" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" minlength="2" maxlength="50" title="OTP">
            </div>
            <div class="form-group"><button name="verify-pin" value="true" class="btn btn-primary btn-block border rounded-pill shadow wobble animated" type="submit" style="color: var(--light);background: var(--blue);">Verify Pin</button></div>
            <div id="count-down"></div>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
        </form>
        <form action="/verify/issue/<?= $issue_id ?>" method="get">
            <div class="form-group"><button name="resend" value="<?= $issue_id ?>" class="btn btn-warning btn-block border rounded-pill shadow wobble animated" type="submit" style="color: var(--dark);background: var(--yellow);">Resend</button></div>
        </form>
    </div><!-- End: Login Form Clean -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready((function() {
            $("[data-bs-tooltip]").tooltip()
            countDown();
        }));

        function countDown() {
            // Set the date we're counting down to
            let time_stamp = <?= $otp_time * 1000 ?>;
            var countDownDate = new Date(time_stamp);
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for minutes and seconds
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="demo"
                document.getElementById("count-down").innerHTML = minutes + "m " + seconds + "s ";
                // If the count down is over, write some text 

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("count-down").innerHTML = "EXPIRED";
                }

            }, 1000);
        }
    </script>
</body>

</html>