<?php session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>

<?php include("../php/header.php"); ?>
    <?php if(isset($_SESSION['error'])&&$_SESSION['displayMessage']): ?>

        <div class="alert alert-danger">
          <strong>Error!</strong>
          <?php echo $_SESSION['error']; ?>
        </div>
    <?php endif; ?>
    <form class="form-signin" method="POST" action="../php/loginScript.php">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus <?php if(isset($_SESSION['username'])){echo "value='".$_SESSION['username']."'";}?>>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
<?php include("../php/footer.php"); ?>
