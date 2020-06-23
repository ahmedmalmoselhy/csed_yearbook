<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sent messages</title>
  <link rel="stylesheet" href="css/app.css">
</head>

<body class="Sent container">
  <nav>
    <img src="images/Logo.svg" alt="Website logo">
    <ul>
      <li><a href="/home">Home</a></li>
      <li><a href="/received">Recieved</a></li>
      <li><a class="active" href="/sent">Sent</a></li>
      <li><a href="/profile?id={{Session::get('id')}}">Profile</a></li>
      <li><a class="logout" href="/">Logout</a></li>
    </ul>
  </nav>
  <main>
  @forelse ($messages as $message)
      <section class="message sent">
        <div class="reciever">
            @if ($message['is_public'] == '1')
                <p>Public</p>
            @else
                <p>To: <a href="/profile?id={{$message["to_id"]}}">{{$message["for"]}}</a></p>
            @endif
        </div>
        <div class="content">
          <!-- Check english or arabic -->
          <p class="clamp rtl">{{$message["message"]}}</p>
          <button class="hidden">See more</button>
          <footer>
            <p>{{$message["timestamp"]}}</p>
            <!-- <p>15/3/2020 at 11:30:20 PM</p> -->
            <form action="/sent" method="POST">
                @csrf
              <input type="text" name="message_id" value={{$message["id"]}} hidden>
              <button type="submit" class="warning">Delete message</button>
            </form>
          </footer>
        </div>
      </section>
    @empty
      <p class="no-messages"> No messages yet! </p>
    @endforelse
  </main>
  <script src="js/app.js"></script>
  <script>
        var msg2 = '{{Session::get('success')}}';
        var exist2 = '{{Session::has('success')}}';
        if(exist2){
            alert(msg2);
        }
        var msg3 = '{{Session::get('fail')}}';
        var exist3 = '{{Session::has('fail')}}';
        if(exist3){
            alert(msg3);
        }
    </script>
</body>

</html>
