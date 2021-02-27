<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Issue Book</title>
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
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
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
                            <a class="nav-link" aria-current="page" href="/admin/dashboard">
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
                            <a class="nav-link" href="/admin/account">
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
                            <a class="nav-link active" href="/book/issue">
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
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">Issue Book</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>

                <div class="container">
                    <div class="container">
                        <br>
                        <center>
                            <h1>New Issue</h1>
                        </center>
                        <div id="alert">
                            <?php
                            if (isset($error_msg)) {
                                echo '
                                    <div class="alert alert-danger" role="alert">
                                        <strong>' . $error_msg . '</strong>
                                    </div>
                                ';
                            }
                            ?>
                        </div>
                        <form id="issueBook-form" action="/book/issue">
                            <label for="">
                                Reference Number :
                            </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="book_ref_num" name="ref_num" value="<?= $ref_num ?>" aria-describedby="helpId" placeholder="Reference Num" maxlength="128" required>
                                <button type="button" class="btn btn-primary" onclick="loadBook()"><i data-feather="book-open"></i></button>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Title :</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" aria-describedby="helpId" placeholder="Book Title" maxlength="128" disabled required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Author :</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?= $author ?>" aria-describedby="helpId" placeholder="Book Author" maxlength="128" disabled required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Publisher :</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" value="<?= $publisher ?>" aria-describedby="helpId" placeholder="Book Publisher" maxlength="128" disabled required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Member ID :</label>
                                <input type="text" class="form-control" id="member_id" name="member_id" aria-describedby="helpId" placeholder="Member ID" maxlength="128" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Member Role :</label>
                                <select class="form-select" name="member_role" aria-label="Member Role">
                                    <option value="Student">Student</option>
                                    <option value="Faculty">Faculty</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Member Name :</label>
                                <input type="text" class="form-control" id="member_name" name="member_name" aria-describedby="helpId" placeholder="Member Name" maxlength="200" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Member Email :</label>
                                <input type="email" class="form-control" id="member_email" name="member_email" aria-describedby="helpId" placeholder="Member Email" maxlength="200" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Member Mobile :</label>
                                <input type="text" class="form-control" id="member_mobile" name="member_mobile" aria-describedby="helpId" placeholder="Member Mobile" pattern="[0-9]{10}" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Proceed <i data-feather="arrow-right-circle"></i> </button> &nbsp;&nbsp; <button type="reset" class="btn btn-warning">Clear&nbsp;<i data-feather="x"></i></button>
                            <div id="loading">
                                <div class="d-flex justify-content-center">
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
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
                <br>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#loading").hide();
            feather.replace() //feather icons
        });

        $("#issueBook-form").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $("#loading").show();
            $("#alert").html("");
            $.ajax({
                type: "POST",
                url: url,
                timeout: 10000,
                data: form.serialize(), // serializes form input
                success: function(data) {
                    if (data.success == true) {
                        var msg = '<br><div class="alert alert-success" role="alert"><h1>Please wait while your\'e being redirected !</h1></div><br>';
                        $("#alert").html(msg);
                        $(location).attr('href', '/verify/issue/' + data.issue_id);
                    } else {
                        var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                        $.each(data.errors, function(key, value) {
                            msg += '<li>' + value + '</li>';
                        });
                        msg += '</ul></div><br>';
                        $("#alert").html(msg);
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                    $("#loading").hide();
                }
            });
        });

        //Load Book
        function loadBook() {
            $("#alert").html('');
            var ref_num = $('#book_ref_num').val();
            if (ref_num === '') {
                return alert('Reference Number is empty !');
            } else {
                $.get("/book/get?ref_num=" + ref_num, function(data) {
                    if (data.success == false) {
                        $("#issueBook-form")[0].reset(); //reset form
                        $("#alert").html('<div class="alert alert-danger" role="alert"><strong>' + data.msg + '</strong></div>')
                    } else if (data.book.status !== "available") {
                        $("#issueBook-form")[0].reset(); //reset form
                        $("#alert").html('<div class="alert alert-danger" role="alert"><strong>Book is not available !</strong></div>')
                    } else {
                        $("#title").val(data.book.title);
                        $("#author").val(data.book.author);
                        $("#publisher").val(data.book.publisher);
                    }
                });
            }

        }
    </script>
</body>

</html>