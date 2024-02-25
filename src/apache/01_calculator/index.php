<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="includes/form_handler.php" method='post'>
    <h1>Calculator</h1>

    <label for="num1">Number 1:</label>
    <input type="number" name="num1" id="num1">

    <label for="operation">Operation:</label>
    <select name="operation" id="operation">
      <option value="add">+</option>
      <option value="sub">-</option>
      <option value="mul">*</option>
      <option value="div">/</option>
    </select>

    <label for="num2">Number 2:</label>
    <input type="number" name="num2" id="num2">

    <button type="submit" name="submit">Calculate</button>
    <label for="result">Result:</label>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error'])) {
      echo '<input class="error" type="text" name="result" id="result" value="'
        . $_GET['error'] . '" disabled>';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['result'])) {
      echo '<input class="success" type="text" name="result" id="result" value="'
        . $_GET['result'] . '" disabled>';
    } else {
      echo '<input type="text" name="result" id="result" disabled>';

    } ?>
  </form>
  <style>
    body {
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }

    h1,
    option {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
  </style>
</body>

</html>
