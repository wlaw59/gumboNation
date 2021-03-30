<?php
require_once('navbar.php');

?>



    <h1>Login</h1>
    <form method="post" action="login_handler.php">
      <div class="user_input_box">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
      </div>
      <br/>
      <div class="user_input_box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
      </div>
      <input type="submit" value="Submit">
    </form>
 <?php
require_once('footer.php');

?>
