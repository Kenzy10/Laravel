<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <br>
    <form action="{{ route('login') }}" method="POST">
        Email <input type="email" name="email" placeholder="Masukan Email">
        <br>
        Password <input type="password" name="password" placeholder="Masukan Password">
        <br>
        <button type="submit">Login</button>
    
</body>
</html>