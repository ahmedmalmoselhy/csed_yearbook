<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSED 2020 - Year book</title>
  <link rel="stylesheet" href="css/app.css">
</head>

<body class="Home container">
  <nav>
    <img src="images/Logo.svg" alt="Website logo">
    <ul>
      <li><a class="active" href="/home">Home</a></li>
      <li><a href="/received">Recieved</a></li>
      <li><a href="/sent">Sent</a></li>
      <li><a href="/profile?id={{Session::get('id')}}">Profile</a></li>
    <li><a class="logout" href="/logout?id= {{ Session::get('id') }}">Logout</a></li>
    </ul>
  </nav>
  <main>
    <form method="POST" action="/home">
        @csrf
        {{-- {{ print_r(Session::get('id')) }} --}}
        <div class="field-input">
            <input type="text" name="from" id="from" hidden value={{ Session::get('id') }}>
            <textarea name="addPost" id="addpost"></textarea>
            <label for="addpost">Your message</label>

        </div>
        <p>*This message will be seen by everyone</p>
        <footer>
            <div>
            <p>Anonymous</p>
            <input type="checkbox" name="anonymus" id="anonymus" hidden>
            <label for="anonymus"><span></span></label>
            </div>
            <button type="submit">Post</button>
        </footer>
    </form>

    @forelse ($messages_response as $message)
      <section class="message">
        @if ($message["is_known"])
          <div class="sender">
            <p><a href="/profile?id={{ $message['sender_id'] }}">{{ $message["from"] }}</a></p>
          </div>
        @else
          <div class="sender anonymus">
            <p>Anonymus</p>
          </div>
        @endif
        <div class="content">
          <!-- Check english or arabic -->
          <p class="clamp rtl">{{ $message["message"] }}</p>
          <button class="hidden">See more</button>
          <footer>
            <p>{{ $message["time"] }}</p>
            <!-- <p>15/3/2020 at 11:30:20 PM</p> -->
          </footer>
        </div>
      </section>
    @empty
      <p class="no-messages"> No messages yet! </p>
    @endforelse
  </main>
  <aside>
    <h2>Members List</h2>
    <div class="field-input">
      <input type="text" name="search" id="search">
      <label for="search">Search</label>
    </div>
    <div class="members-list">
      <div class="line"></div>
      @php
        $char = ""
      @endphp
      @foreach ($users as $user)
        @if ($user['full_name'][0] == $char)
          <span></span>
        @else
          <span class="char">{{$user['full_name'][0]}}</span>
          @php
            $char = $user['full_name'][0];
          @endphp
        @endif
        <p><a href="/profile?id={{ $user['id'] }}" class="name">{{$user['full_name']}}</a></p>
      @endforeach
    </div>
  </aside>
  <script src="js/app.js"></script>
  <script src="js/members.js"></script>
  <script>
        var msg = '{{Session::get('success')}}';
        var exist = '{{Session::has('success')}}';
        if(exist){
        alert(msg);
        }
        var msg2 = '{{Session::get('profile')}}';
        var exist2 = '{{Session::has('profile')}}';
        if(exist2){
        alert(msg2);
        }
    </script>
</body>
</html>
