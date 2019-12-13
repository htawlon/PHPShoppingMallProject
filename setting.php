<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLM Shopping</title>
    <link href="bts/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php" ?>
<div class="container">
    <div class="jumbotron">
        <h3>User Account Setting</h3>
    </div>
    <div class="row">
        <div class="col-sm-8">
          <h4><i class="glyphicon glyphicon-user"></i>
            <?php echo $_SESSION['login'] ['user_name']?>
          </h4>
            <p> Email: <?php  echo $_SESSION['login']['email']?></p>
            <p>Role: <?php if($_SESSION['login']['role'])
                {echo"Administrator";}
                else{ echo"Standard";}
                ?></p>
            <p>joint Date:
                <?php echo date("(D)d m/y", strtotime($_SESSION['login']['create_at'])) ?>

            </p>
        </div>
        <div class="col-sm-4">
            <?php include "message.php" ?>
        <h4 style="margin-bottom: 40px;"> Change Password</h4>
            <form method="post" action="change_password.php">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password_again">New Password Again</label>
                    <input type="password" name="new_password_again" id="new_password_again" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </form>
        </div>
    </div>
</div>
<script src="bts/js/jquery.js"></script>
<script src="bts/js/bootstrap.js"></script>
</body>
</html>
