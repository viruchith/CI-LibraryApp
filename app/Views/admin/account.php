<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>
        Account :
    </title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>Account Settings :</h1>
        </center>
        <br>
        <div id="alert-box">

        </div>
        <br>
        <div>
            <h2>Details :</h2>
            <form id="change-details-form" action="/admin/account" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">E-Mail</label>
                    <input type="email" class="form-control" name="email" value="<?= $email ?>" id="" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="<?= $mobile ?>" aria-describedby="helpId" pattern="[0-9]{10}" placeholder="" required>
                </div>
                <br>
                <div id="change-details-spinner">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <br><br>
            <form id="change-pin-form" action="/admin/changepin" method="post">
                <h2>Change Pin</h2>
                <div class="form-group">
                    <label for="">New Pin</label>
                    <input type="password" class="form-control" name="pin" id="" aria-describedby="helpId" placeholder="" pattern="[0-9]{4}" required>
                </div>
                <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" minlength="8" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Change Pin</button>
                <div id="change-pin-spinner">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div>
            <form id="change-password-form" action="/admin/changepassword" method="post">
                <h2>Change Password</h2>
                <div class="form-group">
                    <label for="">Current Password : </label>
                    <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="" minlength="8" required>
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="newpassword" id="" aria-describedby="helpId" placeholder="" minlength="8" required>
                </div>
                <div class="form-group">
                    <label for="">Retype New Password</label>
                    <input type="password" class="form-control" name="retypepassword" id="" aria-describedby="helpId" placeholder="" minlength="8" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Change Password</button>
                <div id="change-password-spinner">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#change-details-spinner').hide();
            $('#change-pin-spinner').hide();
            $('#change-password-spinner').hide();
        });
        // change pin form
        $("#change-pin-form").submit(
            function(e) {
                e.preventDefault(); // prevent actual form submit
                $('#change-pin-spinner').show();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    timeout: 10000,
                    data: form.serialize(), //
                    success: function(data) {
                        if (data.success === true) {
                            $("#alert-box").html('<br><div class="alert alert-success" role="alert"><strong>' + data.msg + '</strong></div><br>');
                        } else {
                            var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                            $.each(data.errors, function(key, value) {
                                msg += '<li><strong>' + value + '</strong></li>';
                            });
                            msg += '</ul></div><br>';
                            $("#alert-box").html(msg);
                            //To the top
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                        $('#change-pin-spinner').hide();
                    },
                });
            }
        );

        //Change Password
        $("#change-password-form").submit(
            function(e) {
                e.preventDefault(); // prevent actual form submit
                $('#change-password-spinner').show();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    timeout: 10000,
                    data: form.serialize(), //
                    success: function(data) {
                        if (data.success === true) {
                            $("#alert-box").html('<br><div class="alert alert-success" role="alert"><strong>' + data.msg + '</strong></div><br>');
                        } else {
                            var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                            $.each(data.errors, function(key, value) {
                                msg += '<li><strong>' + value + '</strong></li>';
                            });
                            msg += '</ul></div><br>';
                            $("#alert-box").html(msg);
                            //To the top
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                        $('#change-password-spinner').hide();
                    }
                });
            }
        );

        //Change Details Form
        $("#change-details-form").submit(
            function(e) {
                e.preventDefault(); // prevent actual form submit
                $('#change-details-spinner').show();
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    timeout: 10000,
                    data: form.serialize(), //
                    success: function(data) {
                        if (data.success === true) {
                            $("#alert-box").html('<br><div class="alert alert-success" role="alert"><strong>' + data.msg + '</strong></div><br>');
                        } else {
                            var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                            $.each(data.errors, function(key, value) {
                                msg += '<li><strong>' + value + '</strong></li>';
                            });
                            msg += '</ul></div><br>';
                            $("#alert-box").html(msg);
                            //To the top
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                        $('#change-details-spinner').hide();
                    }
                });
            }
        );
    </script>
</body>

</html>