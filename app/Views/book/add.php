<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Add Book</title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>Add Book</h1>
        </center>
        <div id="alert">

        </div>
        <form id="addBook-form" action="/book/add">
            <div class="form-group">
                <label for="">
                    Reference Number :
                </label>
                <input type="text" class="form-control" id="ref_num" name="ref_num" aria-describedby="helpId" placeholder="Reference Num" maxlength="128" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Title :</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="helpId" placeholder="Book Title" maxlength="128" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Author :</label>
                <input type="text" class="form-control" id="author" name="author" aria-describedby="helpId" placeholder="Book Author" maxlength="128" required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Publisher :</label>
                <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="helpId" placeholder="Book Publisher" maxlength="128" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Add Book</button> &nbsp;&nbsp; <button type="reset" class="btn btn-warning">Clear</button>
        </form>
    </div>
    <br>
    <div class="container">
        <center>
            <div id="result_count"></div>
        </center>

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
        $("#addBook-form").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            $("#loading").toggleClass("visible");
            $("#alert").html("");
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function(data) {
                    if (data.success == true) {
                        var msg = '<br><div class="alert alert-success" role="alert">Book added successfully !</div><br>';
                    } else {
                        var msg = '<br><div class="alert alert-danger" role="alert"><ul>';
                        $.each(data.errors, function(key, value) {
                            msg += '<li>' + value + '</li>';
                        });
                        msg += '</ul></div><br>';
                    }
                    $("#alert").html(msg);
                }
            });
        });

    </script>
</body>

</html>