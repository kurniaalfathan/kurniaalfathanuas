
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
	if (isset($_GET['fail'])) {
		echo "<div class='alert alert-danger flash'>Maaf, Username dan Password tidak valid!!</div>";
	}
?>
<div class="list-group-item active">
		<h3><span class="glyphicon glyphicon-log-in"></span> Silahkan <strong>Login</strong></h3>
</div>   
<p></p>
<div class="well">
<form id="form1" name="form1" method="POST" action="action/aksi_log_in.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="Username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="submit" name="button" id="button" value="Login" class="btn btn-primary"/>
    
  </div>
</form>
</div>