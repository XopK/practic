<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capybra.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>
<x-header/>
<div class="container" style="margin-top: 40px; width: 50%;">
    <h1>Авторизация</h1>
    <form action="/login-valid" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Почта</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleFormControlInput1">
            @error('email')
            <div class="alert alert-danger" role="alert">
                {{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="pass" value="{{old('pass')}}" id="exampleFormControlInput2">
            @error('pass')
            <div class="alert alert-danger" role="alert">
                {{$message}}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Войти">
        <a href="/reg" style="float: right">Нет аккаунта?</a>
    </form>
</div>
</body>

</html>
