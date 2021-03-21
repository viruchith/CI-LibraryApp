<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Account Settings</title>
    <!--Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Dashboard.css */
        body {
            font-size: medium;
            font-family: 'Ubuntu', sans-serif;
        }

        label {
            font-size: large;
        }

        table {
            font-size: medium;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
 * Sidebar
 */

        .sidebar {
            position: fixed;
            top: 0;
            /* rtl:raw:
  right: 0;
  */
            bottom: 0;
            /* rtl:remove */
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 48px 0 0;
            /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
 * Navbar
 */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
    </style>


    <!-- Custom styles for this template -->
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">CSE Library</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/admin/logout">Sign out</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="overflow-auto col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Admin</span>
                        <a class="link-secondary" href="/admin/dashboard" aria-label="Add a new report">
                            <span data-feather="user"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/add">
                                <span data-feather="user-plus"></span>
                                Add
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/account">
                                <span data-feather="settings"></span>
                                Account
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Books</span>
                        <a class="link-secondary" href="/book" aria-label="Add a new report">
                            <span data-feather="book"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/book">
                                <span data-feather="book-open"></span>
                                All Books
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/book/search">
                                <span data-feather="search"></span>
                                Search
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/book/issue">
                                <span data-feather="plus-square"></span>
                                Issue Book
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/book/return">
                                <span data-feather="corner-down-left"></span>
                                Return Book
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/book/uploadcsv">
                                <span data-feather="file"></span>
                                Upload CSV
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/book/add">
                                <span data-feather="plus"></span>
                                Add Book
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Entries</span>
                        <a class="link-secondary" href="/entry/all" aria-label="Add a new report">
                            <span data-feather="database"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="/entry/all">
                                <span data-feather="book-open"></span>
                                All Entries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/entry/report">
                                <span data-feather="file-text"></span>
                                Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/entry/batch">
                                <span data-feather="users"></span>
                                Batch Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/entry/search">
                                <span data-feather="search"></span>
                                Search
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">Account Settings</h2>
                </div>

                <div class="container">
                    <div class="container">
                        <div id="search-cont" class="container">
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
                                    <button type="submit" class="btn btn-primary">Update <i data-feather="arrow-up-circle"></i></button>
                                </form>
                                <br>
                                <hr>
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
                                    <button type="submit" class="btn btn-primary">Change Pin&nbsp;<i data-feather="key"></i></button>
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
                            <hr>
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
                                    <button type="submit" class="btn btn-primary">Change Password &nbsp;<i data-feather="lock"></i></button>
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
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2"> Batch Settings</h2>
                </div>
                <div class="container">
                    <div class="container">
                        <div id="batch-alert">

                        </div>
                        <form id="add-batch-form" action="/batch/add" method="post">
                            <div class="form-group">
                                <label for="">Add Batch : </label>
                                <input type="text" class="form-control" name="batch" id="batch" pattern="[0-9]{4}-[0-9]{4}" placeholder="yyyy-yyyy" minlength="9" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <div id="add-batch-spinner">
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
                <div class="container">
                    <div class="container">
                        <div class="container">
                            <ul id="batch-list" class="list-group">

                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#change-details-spinner').hide();
            $('#change-pin-spinner').hide();
            $('#change-password-spinner').hide();
            $('#add-batch-spinner').hide();
            feather.replace() //feather icons
            loadBatches() //load batches available
            /*Year Picker*/
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


        //validate Batch
        function validateBatch() {
            let batch = $("#batch").val();
            let years = batch.split('-');
            let start = parseInt(years[0]);
            let end = parseInt(years[1]);

            if ((end - start) >= 4) {
                return true;
            } else {
                return false;
            }
        }

        //Add Batch Form
        $("#add-batch-form").submit(
            function(e) {
                e.preventDefault(); // prevent actual form submit
                $('#add-batch-spinner').show();
                var form = $(this);
                var url = form.attr('action');

                if (validateBatch()) {

                    $.ajax({
                        type: "POST",
                        url: url,
                        timeout: 10000,
                        data: form.serialize(), //
                        success: function(data) {
                            if (data.success === true) {
                                $("#batch-alert").html('<br><div class="alert alert-success" role="alert"><strong>' + data.msg + '</strong></div><br>');
                            } else {
                                var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                                $.each(data.errors, function(key, value) {
                                    msg += '<li><strong>' + value + '</strong></li>';
                                });
                                msg += '</ul></div><br>';
                                $("#batch-alert").html(msg);
                            }
                        }
                    }); //end of ajax
                    loadBatches();
                } else {
                    $("#batch-alert").html('<br><div class="alert alert-danger" role="alert"><strong>Invalid Batch Input !</strong></div><br>');
                }
                $('#add-batch-spinner').hide();
            }
        );




        function loadBatches() {
            $('#add-batch-spinner').show();
            $.get("/batch", function(data) {
                let items = '';
                $.each(data, function(key, val) {
                    items += '<li class="list-group-item" data-batch="' + key + '" >' + key + '&nbsp;<button data-batch="' + key + '" onclick=deleteBatch(this) class="btn btn-danger"><i data-feather="x-circle" ></i></button></li>';
                });
                $("#batch-list").html(items);
                feather.replace();
                $('#add-batch-spinner').hide();
            });
        }


        function deleteBatch(elem) {
            let batch = $(elem).attr("data-batch");
            if (confirm('Are you sure you want to delete ' + batch + ' ?')) {
                $.post("/batch/delete", {
                    "batch": batch
                }).done(function(data) {
                    if (data.success === true) {
                        $("#batch-alert").html('<br><div class="alert alert-success" role="alert"><strong>' + data.msg + '</strong></div><br>');
                    } else {
                        var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                        $.each(data.errors, function(key, value) {
                            msg += '<li><strong>' + value + '</strong></li>';
                        });
                        msg += '</ul></div><br>';
                        $("#batch-alert").html(msg);
                    }
                    loadBatches();
                });
            }
        }
    </script>
</body>

</html>