<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Search Books</title>
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

        .error {
            color: red;
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
                            <a class="nav-link active" href="/book/search">
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
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">
                        Search Books
                    </h2>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <h3 class="display-6" id="book-total-count" data-count="0"></h3>
                </div>
                <div id="search-cont" class="container">
                    <center>
                        <span class="badge bg-secondary">
                            <h1>Search</h1>
                        </span>
                    </center>
                    <form id="search-form" action="/book/search">
                        <div class="form-group">
                            <label for="">
                                Search
                            </label>
                            <input type="text" class="form-control" id="q" name="q" aria-describedby="helpId" placeholder="Search....." required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Field</label>
                            <select name="match" class="form-select" aria-label="Default select example" required>
                                <option value="ref_num">Reference Number</option>
                                <option value="title">Book Title</option>
                                <option value="author">Book Author</option>
                                <option value="publisher">Book Publisher</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Limit Results per page</label>
                            <select name="limit" class="form-select" aria-label="Default select example" required>
                                <option value="10">10 Results</option>
                                <option value="50">50 Results</option>
                                <option value="100">100 Results</option>
                                <option value="200" selected>200 Results</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Search &nbsp;<i data-feather="search"></i> </button>
                    </form>
                </div>
                <br>
                <hr>
                <div class="container">
                    <div class="d-flex">
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button id="export-csv" type="button" class="btn btn-sm btn-warning">Export to CSV</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <div class="d-flex justify-content-center">
                            <h3 id="results-count" class="display-6"></h3>
                        </div>
                        <table id="books-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ref Number</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <div id="loading">
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
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!--Modal Start -->
    <div class="modal" tabindex="-1" id="edit-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="editor-title" class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-book" action="/book/edit" method="post">
                        <div id="edit-alert-box">

                        </div>
                        <div class="mb-3">
                            <label for="edit-ref-num" class="form-label">Reference Number</label>
                            <input type="text" name="ref-dis" class="form-control" id="edit-ref-num-dis" aria-describedby="emailHelp" disabled required>
                            <input type="text" name="ref_num" class="invisible" id="edit-ref-num" aria-describedby="emailHelp" required>
                            <div id="editHelp" class="form-text">Reference Number cannot be modified !</div>
                        </div>
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Book Title</label>
                            <input type="text" name="title" class="form-control" required id="edit-title">
                        </div>
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Book Author</label>
                            <input type="text" name="author" class="form-control" required id="edit-author">
                        </div>
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Book Publisher</label>
                            <input type="text" name="publisher" class="form-control" required id="edit-publisher">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal End -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <!--CountUp JS -->

    <script type="module">
        import { CountUp } from 'https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js';
        //CountUp
        function resultsCounter(results){

            const options = {
                duration: 3,
                suffix: ' Results',
            };

            let demo = new CountUp('results-count', results, options);
            if (!demo.error) {
                demo.start();
            } else {
                console.error(demo.error);
            }
        }
        

        var serial = 1;

        $(document).ready(function() {
            $("#loading").show();
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#books-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            //feather icons
            feather.replace();
            //bookCounter();
            $("#loading").hide();
        });

        //book status badge
        function bookStatus(status){
            if(status === 'available'){
                return '<span class="badge bg-success">available</span>';
            }else{
                return '<span class="badge bg-danger">'+status+'</span>';
            }
        }

        //generate Issue Link
         function issueLink(ref_num,status){
            if(status === 'available'){
                return '<a href="/book/issue?ref_num='+ref_num+'" target="_blank">'+ref_num+'</a>';
            }else{
                return ref_num;
            }
        }

        // search form
        $("#search-form").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            $("#search-loading").show();
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function(data) {
                    if (data.success == true) {
                        var serial = 1;
                        $("#tbody").html("");
                        $.each(data.books, function() {
                            var row = '<tr id="' + this.ref_num + '" ><td>' + serial + '</td><td>' + issueLink(this.ref_num,this.status) + '&nbsp;<button data-ref-num="' + this.ref_num + '" class="btn btn-info" onclick="edit(this)" ><i data-feather="edit"></i></button>' + '&nbsp;<button data-ref-num="' + this.ref_num + '" class="btn btn-danger" onclick="deleteBook(this)" ><i data-feather="delete"></i></button>' + '</td><td>' + this.title + '</td><td>' + this.author + '</td><td>' + this.publisher + '</td><td>' + bookStatus(this.status) + '</td></tr>';
                            $("#tbody").append(row);
                            serial++;
                        });

                        resultsCounter(data.books.length);
                    } else {
                        $("#tbody").html("");
                        $("#results-count").html("");
                        $("#results-count").html("<h2 class='error' >" + data.msg + "</h2><br>");
                    }
                    feather.replace();
                    $("#search-loading").hide();
                }
            });
        });


        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {
                type: "text/csv"
            });

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }

        function exportTableToCSV() {
            var csv = [];
            var rows = document.querySelectorAll("#books-table tr");

            if (rows.length > 1) {
                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll("td, th");

                    for (var j = 0; j < cols.length; j++)
                        row.push('"' + cols[j].innerText + '"');
                    csv.push(row.join(","));
                }

                // Download CSV file
                downloadCSV(csv.join("\n"), "report.csv");
            } else {
                alert("No data to export !");
            }
        }

        //export-csv Btn
        $("#export-csv").click(function() {
            exportTableToCSV();
        });
    </script>
    <script>
        //edit onclick
        function edit(elem) {
            var ref_num = $(elem).attr("data-ref-num");
            $.ajax({
                url: "/book/get?ref_num=" + ref_num,
                success: function(data) {
                    if (data.success == true) {
                        $("#editor-title").html("Editing : " + data.book.ref_num);
                        $("#edit-ref-num-dis").val(data.book.ref_num);
                        $("#edit-ref-num").val(data.book.ref_num);
                        $("#edit-title").val(data.book.title);
                        $("#edit-author").val(data.book.author);
                        $("#edit-publisher").val(data.book.publisher);
                        $('#edit-alert-box').html('');
                        editModal.show();
                    } else {
                        alert("Book not found !");
                    }
                },
                error: function() {
                    alert("There was an error.");
                }
            });
        }

        function deleteBook(elem) {
            var ref_num = $(elem).attr("data-ref-num");
            if (confirm("Are you sure you want to delete " + ref_num + " ?")) {
                $.ajax({
                    url: "/book/delete?ref_num=" + ref_num,
                    success: function(data) {
                        if (data.success == true) {
                            $('#' + ref_num).remove();
                            alert("Deleted book: " + ref_num + " successfully !");
                        } else {
                            alert(data.msg);
                        }
                    },
                    error: function() {
                        alert("There was an error.");
                    }
                });
            } else {
                console.log("deleted !");
            }
        }


        //edit form
        $("#edit-book").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function(data) {
                    if (data.success == true) {
                        $('#edit-alert-box').html('<br><div class="alert alert-success" role="alert">Updated successfully !</div><br>');
                        $('#' + data.book.ref_num).html('<td>' + ($('#' + data.book.ref_num).index() + 1) + '</td><td>' + data.book.ref_num + '&nbsp;<button data-ref-num="' + data.book.ref_num + '" class="btn btn-info" onclick="edit(this)" ><i class="fas fa-edit"></i></button>' + '&nbsp;<button data-ref-num="' + data.book.ref_num + '" class="btn btn-danger" onclick="deleteBook(this)" ><i class="fas fa-trash-alt"></i></button>' + '</td><td>' + data.book.title + '</td><td>' + data.book.author + '</td><td>' + data.book.publisher + '</td><td>' + data.book.status + '</td>');
                        // load icons
                        feather.replace();
                    } else {
                        $('#edit-alert-box').html('<br><div class="alert alert-danger" role="alert">Invalid Request !</div><br>');
                    }
                }
            });
        });

        // modal
        var editModal = new bootstrap.Modal(document.getElementById('edit-modal'), {
            keyboard: false
        });
    </script>
</body>

</html>