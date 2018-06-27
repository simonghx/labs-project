<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$event->subject}}</title>
</head>
<body>
  <h1>Message de {{$event->name}} :</h1>
  <h2>{{$event->email}}</h2>
  <h2>{{$event->subject}} </h2>
  <p>
    {{$event->message}}
  </p>
  
</body>
</html>