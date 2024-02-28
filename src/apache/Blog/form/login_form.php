<?php
namespace Blog\form;

$loginForm = <<<HTML
<div>
    <h2>Login</h2>
    <form action="form/action/handle_login_form.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <input type="submit" value="Submit">

    </form>
</div>
HTML;
