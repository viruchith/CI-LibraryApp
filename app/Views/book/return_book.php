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
        Initiate Return :
    </title>
</head>

<body>
    <br>
    <div id="search-cont" class="container">
        <br>
        <center>
            <h1>Inititate Return </h1>
        </center>
        <div id="alert">
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (!empty($success) && !empty($msg)) {
                echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
            } else if (!empty($success) && !$success) {
                echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
            }

            ?>
        </div>
        <form action="/book/returnbook" method="get">
            <label for="">
                Reference Number :
            </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="book_ref_num" name="ref_num" value="<?= $book_ref_num ?>" aria-describedby="helpId" placeholder="Reference Num" maxlength="128" required>
                <button type="submit" class="btn btn-primary"><i class="fa fa-book" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <br>
    <?php
    if (!empty($entry_exists)) {
    ?>
        <div id="entry-details" class="container">
            <div class="form-group">
                <label for="">Title :</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $book_title ?>" aria-describedby="helpId" placeholder="Book Title" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Author :</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= $book_author ?>" aria-describedby="helpId" placeholder="Book Author" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member ID :</label>
                <input type="text" class="form-control" id="member_id" name="member_id" value="<?= $member_id ?>" aria-describedby="helpId" placeholder="Member ID" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Role :</label>
                <input type="text" class="form-control" id="member_id" name="member_id" value="<?= $member_role ?>" aria-describedby="helpId" placeholder="Member ID" maxlength="128" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Name :</label>
                <input type="text" class="form-control" id="member_name" name="member_name" value="<?= $member_name ?>" aria-describedby="helpId" placeholder="Member Name" maxlength="200" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Email :</label>
                <input type="email" class="form-control" id="member_email" name="member_email" value="<?= $member_email ?>" aria-describedby="helpId" placeholder="Member Email" maxlength="200" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Member Mobile :</label>
                <input type="text" class="form-control" id="member_mobile" name="member_mobile" value="<?= $member_mobile ?>" aria-describedby="helpId" placeholder="Member Mobile" pattern="[0-9]{10}" disabled>
            </div>
            <br>
            <div class="form-group">
                <label for="">Issue date :</label>
                <input type="text" class="form-control" id="issue_date" name="issue_date" value="<?= date("d/m/Y g:i:s:a", strtotime($issue_time)) ?>" aria-describedby="helpId" placeholder="Member Mobile" disabled>
            </div>
            <br>
        </div>
        <br>
        <center>
            <h2>Confirm Return</h2>
        </center>
        <br>
        <form action="/book/returnbook" method="post" class="container">
            <div class="form-group">
                <input type="hidden" name="ref_num" value="<?= $book_ref_num ?>" required >
                <input type="hidden" name="issue_id" value="<?= $issue_id ?>" required >
                <label for="">Enter your Pin to confirm return :</label>
                <input type="text" class="form-control" name="pin" id="pin" aria-describedby="helpId" pattern="[0-9]{4}" required>
                <small id="helpId" class="form-text text-muted">Enter your four digit pin.</small>
                <br>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure, you want to proceed ?')">Confirm Return</button>
            </div>
        </form>

    <?php
    } // end of if
    ?>
    <br>

    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>

</html>