<?php
if ($act == 'login'){
if ($_SESSION['login'] != true){
title("Login to $cms_name");
page_header("Sign in to $cms_name");
?>
      <form class="form-signin" method="post" action="index.php?act=login&act2=authenticate" name="login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Username" name="inputusername" autofocus>
        <input type="password" class="form-control" placeholder="Password" name="inputpassword">
        <label class="checkbox">
    <!--      <input type="checkbox" value="remember-me"> Remember me -->
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

<?php
//print '<center><h1>Login to '.$cms_name.'</h1></center>
//<hr width="100%" align="center" />
//<form method="post" action="index.php?act=login&act2=authenticate" name="login">
//<table class="table" align="center">
//<tr><td><strong>Username:</strong></td><td><input type="text" name="inputusername"/></td></tr>
//<tr><td><strong>Password:</strong></td><td><input type="password" name="inputpassword" /></td></tr>
//<tr><td><input name="submit" type="submit" value="Login" /></td></tr>
//</table>
//</form>';
if ($act2 == 'authenticate' && $settings['force_block'] == 0){
$iun = $_POST[inputusername];
$inputp = $_POST[inputpassword];
if ($iun != '' || $inputp != ''){
$hashpass = sha1(md5($inputp));
$check_sql = mysql_query("SELECT * FROM users WHERE username = '$iun' AND password = '$hashpass'");
$check_row = mysql_num_rows($check_sql);
if ($check_row == 1){
$select = mysql_query("SELECT * FROM users WHERE username = '$iun'");
while ($row = mysql_fetch_array($select)){
$_SESSION['group'] = $row[group];
$_SESSION['rank'] = $row[rank];
$_SESSION['user_id'] = $row[user_id];
$_SESSION['username'] = $row[username];
$_SESSION['firstname'] = $row[first_name];
$_SESSION['lastname'] = $row[last_name];
$_SESSION['theme_location'] = ''.$_SERVER['DOCUMENT_ROOT'].'/'.$row[theme].'/';
$_SESSION['theme_link'] = 'theme/'.$row[theme].'/';
$_SESSION['theme_name'] = $row[theme];
$_SESSION['access_file_manager'] = $row[access_file_manager];
$_SESSION['choice'] = 'agree';
};//while ($row = mysql_fetch_array($select))
$_SESSION['login'] = true;
$sql = "UPDATE users SET last_log_on = '$local_time', ip = '$ip' WHERE username = '$_SESSION[username]'";
$result2 = mysql_query($sql) or die (mysql_error());
$sql2 = "UPDATE users SET online = '1' WHERE username = '$_SESSION[username]'";
$result3 = mysql_query($sql2) or die (mysql_error());
redirect("index.php");
}//if ($check_row == 1)
else{
redirect("index.php?act=failed&id=1");
};
}//if ($iun != '' || $inputp != '')
else{
redirect("index.php?act=failed&id=1");
};
};//if ($$settings['force_block'] == 0)
}//if ($_SESSION['login'] != true)
else{
title("Login Error");
print '<center><h1>You Are Already Logged In</h1></center>
<hr width="100%" align="center" />
<table class="table" align="center">
<tr><td>
You are already logged in to the '.$cms_name.' system.
</td></tr>
</table>';
};
};//if ($act == 'login')
//LOGOUT SCRIPT
if ($act == 'logout'){
$result = mysql_query("UPDATE users SET `online` = '0' WHERE `username` = '$_SESSION[username]'") or die (mysql_error());
$_SESSION['login'] = false;
redirect("index.php");
};//if ($act == 'logout')
?>