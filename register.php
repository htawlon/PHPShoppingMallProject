<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mawlamyine Store</title>
    <link href="bts/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <?php include "message.php"; ?>
            <h3 class="text-center"> Signin to continued</h3>
            <form method="post" action="post_register.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="retype_password">Password</label>
                    <input type="password" name="retype_password" id="retype_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg" >Signin</button>
            </form>
            It has an account ? <a href="login.php">Signin</a>
        </div>
    </div>
</div>


<script src="bts/js/jquery.js"></script
<script src="bts/js/bootstrap.js"></script>
</body>
</html>
