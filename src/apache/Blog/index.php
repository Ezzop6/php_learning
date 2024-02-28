<?php
namespace Blog;

require_once __DIR__ . '/db/Database.php';
require_once __DIR__ . '/form/register_form.php';
require_once __DIR__ . '/form/login_form.php';

$index = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    $loginForm
    
    </body>
</html>
HTML;

echo $index;
