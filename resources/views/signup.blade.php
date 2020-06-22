<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body class="Signup">
  <header>
    <img src="/images/Logo.svg" alt="Website Logo">
  </header>
  <form method="POST" action="/signup">
    @csrf
    <div class="form-row">
      <div class="field-input">
        <input type="text" name="full_name" id="fullname">
        <label for="fullname">Full name</label>
        {{-- @if ($error == "full_name") --}}
          <p class="error">You must type your full name</p>
        {{-- @endif --}}
      </div>
      <div class="field-input">
        <input type="text" name="username" id="username">
        <label for="username">User name</label>
        {{-- @if ($error == "username") --}}
          <p class="error">You must type your user name</p>
        {{-- @endif --}}
      </div>
    </div>
    <div class="form-row">
      <div class="field-input">
        <input type="password" name="password" id="password">
        <label for="password">Password</label>
        {{-- @if ($error == "password") --}}
          <p class="error">You must type your password</p>
        {{-- @endif --}}
      </div>
      <div class="field-input">
        <input type="password" name="confirmPassword" id="confirmpassword">
        <label for="confirmpassword">Confirm password</label>
        {{-- @if ($error == "confirm_password") --}}
          <p class="error">You must re-type your password</p>
        {{-- @endif --}}
      </div>
    </div>
    <button type="submit">Signup</button>
    <p class="redirect">Already signed in?<a href="/login">Login</a></p>
  </form>
  <script src="js/app.js"></script>
</body>
</html>
