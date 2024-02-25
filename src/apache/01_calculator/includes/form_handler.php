<?php
function calculate($num1, $num2, $operation): float|int
{
  return match ($operation) {
    'add' => $num1 + $num2,
    'sub' => $num1 - $num2,
    'mul' => $num1 * $num2,
    'div' => $num1 / $num2,
    default => 0,
  };
}
function responseError($message)
{
  header('Location: ../index.php?error=' . $message);
  exit();
}

function responseResult($result)
{
  header('Location: ../index.php?result=' . $result);
  exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $num1 = htmlspecialchars($_POST['num1']);
  $num2 = htmlspecialchars($_POST['num2']);
  $operation = htmlspecialchars($_POST['operation']);

  if (!is_numeric($num1) || !is_numeric($num2)) {
    responseError('notNumber');
  } elseif ($operation === 'div' && $num2 == 0) {
    responseError('divisionByZero');
  } elseif (!in_array($operation, ['add', 'sub', 'mul', 'div'])) {
    responseError('invalidOperation');
  }
  responseResult(calculate($num1, $num2, $operation));

} else {
  responseError('invalidMethod');
}
