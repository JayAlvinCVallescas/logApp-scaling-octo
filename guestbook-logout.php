<?php
    setcookie('username',$_POST['username'] , time() - 1, "/");
    setcookie('password',$_POST['password'] , time() - 1, "/");
?>