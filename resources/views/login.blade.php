<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="Signup">
  <header>
    <img src="images/Logo.svg" alt="Website Logo">
  </header>
  <form method="POST" action="/login">
    <div class="field-input">
      <input type="text" name="username" id="username">
      <label for="username">User name</label>
      @if ($error == "username")
        <p class="error">You must type your user name</p>
      @endif
    </div>
    <div class="field-input">
      <input type="password" name="password" id="password">
      <label for="password">Password</label>
      @if ($error == "password")
        <p class="error">You must type your password</p>
      @endif
    </div>
    <button type="submit">Login</button>
    <p class="redirect">Don't have an accout?<a href="/signup">Signup</a></p>
  </form>
  <script src="js/app.js"></script>
</body>
</html>