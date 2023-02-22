<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test tinkiet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form method="post" action="http://localhost:3000/candidate/submit.php" enctype="multipart/form-data">
  <label for="first-name"></label>
  <input type="text" id="first-name" name="firstName" placeholder="First Name" required>

  <label for="last-name"></label>
  <input type="text" id="last-name" name="lastName" placeholder="Last Name" required>

  <label for="email"></label>
  <input type="email" id="email" name="email" placeholder="Email" required>

  <label for="description"></label>
  <textarea id="description" name="description" placeholder="About You" required></textarea>

  <label for="cv"></label>
  <input type="file" id="cv" name="cv">

  <button type="submit">SUBMIT</button>
</form>
</body>

</html>
