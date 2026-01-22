<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body>
    <h1>Hello {{ $mailable['employer']->name }}</h1>
     <p>Job Title {{ $mailable['job']->title }}</p>

     <p>Employee Details:</p>
     <p>{{ $mailable['user']->name }}</p>
     <p>{{ $mailable['user']->email }}</p>
     <p>{{ $mailable['user']->phone }}</p>
</body>
</html>