<?php
namespace Blog\form;

$registerForm = <<<HTML
<div>
    <h2>Register</h2>
    <form action="form/action/handle_register_form.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Email">
        
        <input type="submit" value="Submit">

    </form>
</div>
HTML;
