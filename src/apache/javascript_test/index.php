<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <h1>Javascript test</h1>
  <p id="test"></p>
  <script>
    for (let i = 0; i < 10; i++) {
      document.getElementById("test").innerHTML += `This is line ${i + 1} <br>`;
    }
    const () => console.log("Hello");
  </script>
</body>

</html>
