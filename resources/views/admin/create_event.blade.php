@extends('admin.base')
@section('title', "create-page")
@section('content')
    <div class="container">
        <h3 class="admin-panel__title" >Форма создания страницы</h3>
        <form action="/admin/page" method="post" enctype="multipart/form-data" class="form">
            {{ csrf_field() }}
            <div class="form-main">
                <div class="form-block">
                    <input hidden type="text" name="parent_code" value="{{$parent_code}}" size="10">
                    <p>Код страницы<br>
                        <input type="text" name="code" size="10">
                    </p>
                    <p>Заголовок <br>
                        <input type="text" name="title" size="255">
                    </p>
                    <p>Текст события: <br>
                        <textarea  name="description" cols="40" rows="5" maxlength="2000" >
                         </textarea>
                    </p>
                    <p>Дата события (Год-Месяц-День): <br>
                        <input type="text" name="event_date" placeholder="2020-03-22" size="40">
                    </p>
                    <p>Картинка: <br>
                        <input type="file" name="image" width="50">
                    </p>
                    <p>Создать ссылку на другую страницу <br>
                        <input type="text" name="alias_of" placeholder="Введите код страницы" size="255">
                    </p>
                </div>
            </div>
            <button class="admin-button add-but" type="submit">
                Добавить
            </button>
            <a class="admin-button cancle-but" href="/admin/page">
                Отмена
            </a>
        </form>
        @if(!empty($errors))
            @if($errors->any())
                <ul class="alert alert-danger" style="list-style-type: none">
                    @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            @endif
        @endif


    </div>

@endsection
