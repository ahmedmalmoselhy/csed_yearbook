<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/app.css">
</head>

<body class="Profile">
  <header>
    <nav>
      <img src="images/Logo.svg" alt="Website logo">
      <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="/received">Recieved</a></li>
        <li><a href="/sent">Sent</a></li>
          <li><a class={{$user_id == $profile_id ? "active" : ""}} href="/profile">Profile</a></li>
        <li><a class="logout" href="/">Logout</a></li>
      </ul>
    </nav>
    <h1>Here we meet again</h1>
  </header>
  <main class="container">
    <div class="user-data">
      <h2>{{$full_name}}</h2>
      <div>
        <p>Recived <span>{{$recieved_no}}</span></p>
        <p>Sent <span>{{$sent_no}}</span></p>
      </div>
    </div>

    @if ($user_id != $profile_id)
    <form method="POST" action="/profile">
      <div class="field-input">
        <textarea name="message" id="addpost"></textarea>
        <label for="addpost">Your message</label>
      </div>
      <p>*This message will be seen by everyone</p>
      <input type="text" name="from" id="from" hidden value={{$user_id}}>
      <input type="text" name="to" id="to" hidden value={{$profile_id}}>
      <footer>
        <div>
          <p>Anonymus</p>
          <input type="checkbox" name="is_known" id="anonymus" hidden>
          <label for="anonymus"><span></span></label>
        </div>
        <button type="submit">Post</button>
      </footer>
    </form>
    @endif

    @forelse ($messages as $message)
      <section class="message">
        @if ($message["is_known"])
          <div class="sender">
            <p><a href="/profile?id={{$message["id"]}}">{{$message["from"]}}</a></p>
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
            <p>{{$message["time"]}}</p>
            <!-- <p>15/3/2020 at 11:30:20 PM</p> -->
            @if ($user_id == $profile_id)
            <form action="/profile" method="POST">
              <input type="text" name="message_id" value={{$message["message_id"]}} hidden>
              <button type="submit">Hide from profile</button>
            </form>
            @endif
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