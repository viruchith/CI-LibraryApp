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
        New Issue
    </title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>New Issue</h1>
        </center>
        <div id="alert">

        </div>
        <form id="issueBook-form" action="/book/issuebook">
            <label for="">
                Reference Number :
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="book_ref_num" name="ref_num" aria-describedby="helpId" placeholder="Reference Num" maxlength="128" required>
                <button type="button" class="btn btn-primary" onclick="loadBook()"><i class="fa fa-book" aria-hidden="true"></i></button>
            </div>
            <br>
            <div class="form-group">
                <label for="">Title :</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="helpId" placeholder="Book Title" maxlength="128" disabled required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Author :</label>
                <input type="text" class="form-control" id="author" name="author" aria-describedby="helpId" placeholder="Book Author" maxlength="128" disabled required>
            </div>
            <br>
            <div class="form-group">
                <label for="">Publisher :</label>
                <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="helpId" placeholder="Book Publisher" maxlength="128" disabled required>
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
            <button type="submit" class="btn btn-primary">Proceed <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </button> &nbsp;&nbsp; <button type="reset" class="btn btn-warning">Clear</button>
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
        $("#issueBook-form").submit(function(e) {
            e.preventDefault(); // prevent actual form submit
            var form = $(this);
            var url = form.attr('action'); //get submit url [replace url here if desired]
            //$("#loading").toggleClass("visible");
            $("#alert").html("");
            $.ajax({
                type: "POST",
                url: url,
                timeout:10000,
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
                }
            });
        });

        function clearBookFields() {
            $("#title").val('');
            $("#author").val('');
            $("#publisher").val('');
        }
        //Load Book
        function loadBook() {
            $("#alert").html('');
            var ref_num = $('#book_ref_num').val();
            if (ref_num === '') {
                return alert('Reference Number is empty !');
            } else {
                $.get("/book/get?ref_num=" + ref_num, function(data) {
                    if (data.success == false) {
                        clearBookFields();
                        $("#alert").html('<div class="alert alert-danger" role="alert"><strong>' + data.msg + '</strong></div>')
                    } else if (data.book.status !== "available") {
                        clearBookFields();
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