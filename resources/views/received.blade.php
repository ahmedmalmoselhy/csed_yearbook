<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Received messages</title>
  <link rel="stylesheet" href="css/app.css">
</head>

<body class="container">
  <nav>
    <img src="images/Logo.svg" alt="Website logo">
    <ul>
      <li><a href="/home">Home</a></li>
      <li><a class="active" href="/received">Recieved</a></li>
      <li><a href="/sent">Sent</a></li>
      <li><a href="/profile">Profile</a></li>
      <li><a class="logout" href="/">Logout</a></li>
    </ul>
  </nav>
  <main>
    @forelse ($messages as $message)
      <section class="message">
        @if ($message["is_known"])
          <div class="sender">
            <p><a href="/profile?id={{$message["from_id"]}}">{{$message["sender"]}}</a></p>
          </div>
        @else
          <div class="sender anonymus">
            <p>Anonymus</p>
          </div>
        @endif
        <div class="content">
          <!-- Check english or arabic -->
          <p class="rtl clamp">{{$message["message"]}}</p>
          <button class="hidden">See more</button>
          <footer>
            <p>{{$message["timestamp"]}}</p>
            <!-- <p>15/3/2020 at 11:30:20 PM</p> -->
            <form action="/received" method="POST">
              <input type="text" name="message_id" value={{$message["id"]}} hidden>
              <button type="submit">Show on profile</button>
            </form>
          </footer>
        </div>
      </section>
    @empty
      <p class="no-messages"> No messages yet! </p>
    @endforelse
  </main>
  <script src="js/app.js"></script>
</body>

</html>
