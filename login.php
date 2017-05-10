<?php
session_start();

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

if (isset($_POST) && !empty($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['ERRORMESSAGE'] = 'Username or password is not correct.';
    header('location: '. $_SERVER['PHP_SELF']);
    exit();
  }
  if ($_POST['username'] != 'demo' || $_POST['password'] != 'demo') {
    $_SESSION['ERRORMESSAGE'] = 'Username or password is not correct.';
    header('location: '. $_SERVER['PHP_SELF']);
    exit();
  }

  // แบบที่ 1
  $_SESSION['COMPANYCODE'] = 'POSCOM001';
  header('location: cart1.php');

  // แบบที่ 2 (ไม่แนะนำ)
  // header('location: cart1.php?compcode=POSCOM001');

  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Login </title>
<link rel="stylesheet" href="css/bootstrap.min.css?ver=3.3.7" type="text/css" media="all" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($_SESSION['ERRORMESSAGE'])) { ?>
        <p class="alert alert-danger"><?php echo $_SESSION['ERRORMESSAGE']; ?></p>
        <?php } ?>
        <h3>Form Login</h3>
        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">Username : </label>
            <div class="col-xs-3">
              <input type="text" class="form-control" name="username" value="" maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">Password : </label>
            <div class="col-xs-3">
              <input type="password" class="form-control" name="password" value="" maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">&nbsp;</label>
            <div class="col-xs-3">
              <button type="submit" name="submit" class="btn btn-primary" value="submit">Login</button>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-xs-3 control-label">&nbsp;</label>
            <div class="col-xs-3">
              <p>Username : demo &nbsp; , &nbsp; password : demo</p>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
<?php
$_SESSION['ERRORMESSAGE'] = null;
?>
