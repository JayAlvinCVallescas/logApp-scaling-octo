<?php
 include('config/config.php');
 include('config/db.php');
  if(isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqluser = "SELECT * FROM account WHERE username = '$username'";
    $okayuser = mysqli_fetch_array(mysqli_query($conn,$sqluser));
    if(!empty($okayuser) and $password == $okayuser['pass'] and $okayuser['account_type'] == 'admin')
    {
      header("Location: guestbook-list.php");
      exit();
    } 
    else if(!empty($okayuser) and $okayuser['account_type'] == 'member') {
      echo "You're not an admin, Can't redirect to Guestbook-list";
    }
    else { echo "User account doesn't exist or incorrect password"; }

    setcookie('username',$_POST['username'] , time() + (86400 * 30), "/");
    setcookie('password',$_POST['password'] , time() + (86400 * 30), "/");
  }

?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>