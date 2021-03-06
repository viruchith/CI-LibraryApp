<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Edit Books</title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>Search Books</h1>
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
                    <option value="200">200 Results</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Search <i class="fa fa-search" aria-hidden="true"></i> </button>
        </form>
    </div>
    <br>
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

    <div class="container">
        <center>
            <div id="result_count"></div>
        </center>
        <div class="table-responsive">
            <table id="books-table" class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>

        <center>
            <div class="invisible" id="loading">
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
        </center>

    </div>
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        // search form
        $("#search-form").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $("#loading").toggleClass("visible");
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function(data) {
                    if (data.success == true) {
                        var serial = 1;
                        $("#tbody").html("");
                        $.each(data.books, function() {
                            var row = '<tr id="' + this.ref_num + '" ><td>' + serial + '</td><td>' + this.ref_num + '&nbsp;<button data-ref-num="' + this.ref_num + '" class="btn btn-info" onclick="edit(this)" ><i class="fas fa-edit"></i></button>' + '</td><td>' + this.title + '</td><td>' + this.author + '</td><td>' + this.publisher + '</td><td>' + this.status + '</td></tr>';
                            $("#tbody").append(row);
                            serial++;
                        });
                        $("#result_count").html("<h2> " + data.books.length + " results</h2><br>");

                    } else {
                        $("#tbody").html("");
                        $("#result_count").html("");
                        $("#result_count").html("<h2>" + data.msg + "</h2><br>");
                    }
                    $("#loading").toggleClass("visible");
                }
            });
        });

        // modal
        var editModal = new bootstrap.Modal(document.getElementById('edit-modal'), {
            keyboard: false
        });
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

                    }
                },
                error: function() {
                    alert("There was an error.");
                }
            });
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
                        $('#' + data.book.ref_num).html('<td>' + ($('#' + data.book.ref_num).index() + 1) + '</td><td>' + data.book.ref_num + '&nbsp;<button data-ref-num="' + data.book.ref_num + '" class="btn btn-info" onclick="edit(this)" ><i class="fas fa-edit"></i></button>' + '</td><td>' + data.book.title + '</td><td>' + data.book.author + '</td><td>' + data.book.publisher + '</td><td>' + data.book.status + '</td>');
                    } else {
                        $('#edit-alert-box').html('<br><div class="alert alert-danger" role="alert">Invalid Request !</div><br>');
                    }
                }
            });
        });
    </script>
</body>

</html>