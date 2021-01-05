<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-pannel | Iz Vladeniya Akello </title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        input {
            display: block;
            width: 100%;
            margin-top: 5px;
        }
        h3 {
            margin-bottom: 15px;
        }
        .admin-form {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .admin-form__field {
            margin: 10px 0;
        }
        .but {
            margin-top: 15px;
            background: #098fe8;
            color: white;
            border: 0;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form class="admin-form" action="{{route('admin.getForm')}}" method="post">
    {{ csrf_field() }}
    <h3>Вход в админ панель</h3>
    <div class="admin-form__field">
        <label for="var-title" class="form-label">Логин</label>
        <input type="text" name="login" class="form-control" id="var-title">
    </div>
    <div class=class="admin-form__field">
        <label for="var-title" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="var-password">
    </div>
    <div class="col-12">
        <button type="submit" class="but">Войти</button>
    </div>
</form>

</body>
