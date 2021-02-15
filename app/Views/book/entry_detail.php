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
        Issue : <?= $issue_id ?>
    </title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>Issue : <?= $issue_id ?></h1>
        </center>


        <div>
            <h4>Issue Id : <span class="badge bg-primary"><?= $issue_id ?></span></h4>
            <label for="">
                Reference Number :
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?= $book_ref_num ?>" id="book_ref_num" name="ref_num" aria-describedby="helpId" placeholder="Reference Num" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Title :</label>
                <input type="text" class="form-control" value="<?= $book_title ?>" id="title" name="title" aria-describedby="helpId" placeholder="Book Title" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Author :</label>
                <input type="text" class="form-control" value="<?= $book_author ?>" id="author" name="author" aria-describedby="helpId" placeholder="Book Author" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member ID :</label>
                <input type="text" class="form-control" value="<?= $member_id ?>" id="member_id" name="member_id" aria-describedby="helpId" placeholder="Member ID" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Role :</label>
                <input type="text" class="form-control" value="<?= $member_role ?>" name="" id="" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Name :</label>
                <input type="text" class="form-control" value="<?= $member_name ?>" id="member_name" name="member_name" aria-describedby="helpId" placeholder="Member Name" maxlength="200" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Email :</label>
                <input type="email" class="form-control" value="<?= $member_email ?>" id="member_email" name="member_email" aria-describedby="helpId" placeholder="Member Email" maxlength="200" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Mobile :</label>
                <input type="text" class="form-control" value="<?= $member_mobile ?>" id="member_mobile" name="member_mobile" aria-describedby="helpId" placeholder="Member Mobile" pattern="[0-9]{10}" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Issue Date : </label>
                <input type="text" class="form-control" value="<?= date("d/m/Y g:i:s:a", strtotime($issue_time)) ?>" id="member_mobile" name="member_mobile" aria-describedby="helpId" placeholder="Member Mobile" disabled>
            </div>

            <br>
            <div class="form-group">
                <?php

                if (!$is_returned) {
                    echo '<label for="">Returned book : <span class="badge bg-danger">No</span> </label><br><small>'.round((time()-strtotime($issue_time))/ (60 * 60 * 24)).' days since issue</small>';
                } else {
                    echo '<label for="">Returned book : <span class="badge bg-success">Yes</span> </label><br>';
                    echo '<label for="">Returned on : ' . date("d/m/Y g:i:s:a", strtotime($return_time)) . '</label><br>Returned after '.round((strtotime($return_time) - strtotime($issue_time)) / (60 * 60 * 24)).' days ';
                }

                ?>
            </div>

        </div>
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

    </script>
</body>

</html>