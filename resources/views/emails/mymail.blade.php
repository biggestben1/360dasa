<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>

<body>
<p>Hello or Dear {{$contactedb->title}} {{$contactedb->firstname}} {{$contactedb->last_name}},</p>
<p>We'd love to hear from you. Please fill out this survey to give us your feedback.</p>
<p><a href="http://360dasa.org/survey/view/{{$Survey->id}}">Please Click</a></p>
<p>Thanks!</p>
<p>{{$user->title}} {{$user->firstname}} {{$user->last_name}}</p>
</body>
</html>
