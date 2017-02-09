
  <?php
  require('anyco_ui.inc');
  ui_print_header('Login Page');
  $c = oci_connect('hr','hr','localhost/xe');
  
  if (!$c){
    $e = oci_error();
      trigger_error('Cannot connect to the Network Database' . $e['message'], E_USER_ERROR);
  }
?>

<div>
<form method="post", action"#">
<label>Username</label><br>
<input type="text" name="username"/><br>
<label>Password (e-mail)</label><br>
<input type="password" name="password"/><br>
<input type="submit" name = "submit" , value = "submit"/><br>
</form>
</div>
<?php 
    if(isset($_POST['submit'])){
      $c_username = addslashes($_POST['username']);
      $c_password = addslashes($_POST['password']);
      $sel_c = "select * from EMPLOYEES where EMAIL = '" .$c_password . "' AND EMPLOYEE_ID ='".$c_username."'";
      $run_c = oci_parse($c,$sel_c);
      $exec = oci_execute($run_c);
      $arr = oci_fetch_array($run_c);
      $check_num = oci_num_rows($run_c);

      if($check_num == 0){
        echo "<script>alert('Username / Password is not valid')</script>";
      }else{
        header("Location: anyco.php");
      }
  
    }  
    ui_print_footer(date('Y-m-d H:i:s'));
  ?>
</body>
</html>
