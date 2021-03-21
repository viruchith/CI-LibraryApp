<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>All Entries</title>
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
                            <a class="nav-link active" href="/entry/all">
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
                    <h2 class="h2">All Entries</h2>
                </div>

                <div class="container">
                    <div class="container">
                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link en-nav-link active" aria-current="true" id="all-entries" href="#all-entries">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link en-nav-link" aria-current="false" id="pending-entries" href="#pending-entries">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link en-nav-link" aria-current="false" id="returned-entries" href="#returned-entries">Returned</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-lg-start">
                                    <div class="btn btn-warning" id="export-csv">Export</div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="search" placeholder="Search" name="" id="search">
                                </div>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table id="entries-table" class="table table-sm table-bordered" data-current="all-entries">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Issue Id</th>
                                                <th>Ref num</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Member Id</th>
                                                <th>Member Name</th>
                                                <th>Member Email</th>
                                                <th>Member Mobile</th>
                                                <th>Member Role</th>
                                                <th>Batch</th>
                                                <th>Issue Time</th>
                                                <th>Status</th>
                                                <th>Return Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
            </main>
        </div>
    </div>


    <!--Modal Start -->
    <div class="modal" tabindex="-1" id="pending-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="pending-title" class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="edit-alert-box">

                    </div>
                    <div id="pending-list">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal End -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        //sno
        var serial = 1;
        //all page num
        var all_page_num = 1;
        //pending page num
        var pending_page_num = 1;
        //returned page num
        var returned_page_num = 1;

        $(document).ready(function() {
            $("#loading").hide();
            feather.replace() //feather icons
            //loadEntries onto Table
            loadAllEntries();
        });

        function entryStatus(code) {
            if (code === '1')
                return "<span class='badge bg-success'>Returned <i data-feather='check-circle'></i></span>";
            else
                return "<span class='badge bg-danger'>Pending  <i data-feather='x-circle'></i></span>";
        }

        function returnDate(code, date) {
            if (code === '1')
                return new Date(date).toLocaleDateString("en-IN");
            else
                return "NIL";

        }

        function validBatch(role, batch) {
            if (role === "Student") {
                return batch;
            } else {
                return "NIL";
            }
        }

        function loadAllEntries() {
            $.get("/entry/get?id=all-entries&page=" + all_page_num, function(data) {
                var tbody = '';
                if (data.success == true) {
                    $.each(data.entries, function() {
                        tbody += '<tr><td>' + serial + '</td><td><a href="/entry/' + this.issue_id + '" target="_blank" >' + this.issue_id + '</a></td><td>' + this.book_ref_num + '</td><td>' + this.book_title + '</td><td>' + this.book_author + '</td><td><span class="badge bg-secondary" onclick="showPendingEntries(\'' + this.member_id + '\')" >' + this.member_id + '</span></td><td>' + this.member_name + '</td><td>' + this.member_email + '</td><td>' + this.member_mobile + '</td><td>' + this.member_role + '</td><td>' + validBatch(this.member_role, this.batch) + '</td><td>' + new Date(this.issue_time).toLocaleDateString("en-IN") + '</td><td>' + entryStatus(this.is_returned) + '</td><td>' + returnDate(this.is_returned, this.return_time) + '</td></tr>';
                        serial++
                    });
                    all_page_num++;
                    $("#tbody").html(tbody);
                    feather.replace() //feather icons
                }
            });
        }


        function loadPendingEntries() {
            $.get("/entry/get?id=pending-entries&page=" + pending_page_num, function(data) {
                var tbody = '';
                if (data.success == true) {
                    $.each(data.entries, function() {
                        tbody += '<tr><td>' + serial + '</td><td><a href="/entry/' + this.issue_id + '" target="_blank" >' + this.issue_id + '</a></td><td>' + this.book_ref_num + '</td><td>' + this.book_title + '</td><td>' + this.book_author + '</td><td><span class="badge bg-secondary" onclick="showPendingEntries(\'' + this.member_id + '\')" >' + this.member_id + '</span></td><td>' + this.member_name + '</td><td>' + this.member_email + '</td><td>' + this.member_mobile + '</td><td>' + this.member_role + '</td><td>' + validBatch(this.member_role, this.batch) + '</td><td>' + new Date(this.issue_time).toLocaleDateString("en-IN") + '</td><td>' + entryStatus(this.is_returned) + '</td><td>' + returnDate(this.is_returned, this.return_time) + '</td></tr>';
                        serial++
                    });
                    pending_page_num++;
                    $("#tbody").html(tbody);
                    feather.replace() //feather icons
                }
            });
        }

        function loadReturnedEntries() {
            $.get("/entry/get?id=returned-entries&page=" + returned_page_num, function(data) {
                var tbody = '';
                if (data.success == true) {
                    $.each(data.entries, function() {
                        tbody += '<tr><td>' + serial + '</td><td><a href="/entry/' + this.issue_id + '" target="_blank" >' + this.issue_id + '</a></td><td>' + this.book_ref_num + '</td><td>' + this.book_title + '</td><td>' + this.book_author + '</td><td><span class="badge bg-secondary" onclick="showPendingEntries(\'' + this.member_id + '\')" >' + this.member_id + '</span></td><td>' + this.member_name + '</td><td>' + this.member_email + '</td><td>' + this.member_mobile + '</td><td>' + this.member_role + '</td><td>' + validBatch(this.member_role, this.batch) + '</td><td>' + new Date(this.issue_time).toLocaleDateString("en-IN") + '</td><td>' + entryStatus(this.is_returned) + '</td><td>' + returnDate(this.is_returned, this.return_time) + '</td></tr>';
                        serial++
                    });
                    returned_page_num++;
                    $("#tbody").html(tbody);
                    feather.replace() //feather icons
                }
            });
        }

        //search
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#entries-table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        //en-nav-link
        $(".en-nav-link").click(function() {
            const tab_list = ['all-entries', 'pending-entries', 'returned-entries'];
            var current_active = $(this).attr("id");

            tab_list.forEach(function(item, index) {
                if (current_active === item) {
                    $("#" + current_active).addClass("active");
                    $("#entries-table").attr("data-current", current_active);
                } else {
                    $("#" + item).removeClass("active");
                }
            });
            if (current_active === "all-entries") {
                serial = 1;
                loadAllEntries();
                pending_page_num = 1;
                returned_page_num = 1
            } else if (current_active === "pending-entries") {
                serial = 1;
                loadPendingEntries();
                all_page_num = 1;
                returned_page_num = 1
            } else {
                serial = 1;
                loadReturnedEntries();
                all_page_num = 1;
                pending_page_num = 1;
            }

        });

        //scroll pagination
        $(window).on("scroll", function() {
            var scrollHeight = $(document).height();
            var scrollPosition = $(window).height() + $(window).scrollTop();
            if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
                $("#loading").show();
                let current_tab = $("#entries-table").attr("data-current");
                if (current_tab === "all-entries") {
                    loadAllEntries();
                    all_page_num += 1;
                } else if (current_tab === "pending-entries") {
                    loadPendingEntries();
                    pending_page_num += 1;
                } else {
                    loadReturnedEntries();
                    returned_page_num += 1;
                }
                $("#loading").hide();
            }
        });

        function showPendingEntries(member_id) {
            $.get("/entry/pending/" + member_id, function(data) {
                let body = '';
                $("#pending-title").html('RegNo: ' + member_id);
                if (data.success === true) {
                    body += '<div class="table-responsive" ><h3>Pending Books: ' + data.entries.length + '</h3><table class="table table-bordered"><thead><tr><th>Ref Num</th><th>Title</th><th>Author</th></tr></thead><tbody>';
                    $.each(data.entries, function() {
                        body += '<tr><td>' + this.book_ref_num + '</td><td>' + this.book_title + '</td><td>' + this.book_author + '</td></tr>';
                    });
                    body += '<tbody></table></div>';
                    $("#pending-list").html(body);
                } else {
                    $("#pending-list").html(data.msg);
                }
            });
            pendingModal.show();
        }

        // modal
        var pendingModal = new bootstrap.Modal(document.getElementById('pending-modal'), {
            keyboard: false
        });


        //export to csv
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
            var rows = document.querySelectorAll("#entries-table tr");

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
</body>

</html>