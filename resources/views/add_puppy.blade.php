@extends('admin_base')
@section('title', "{{ add-puppy}}")
@section('content')
    <div class="container">
        <h3 class="admin-panel__title" >Добавление щенка</h3>
        <form action="{{route('puppies.store')}}" method="post" enctype="multipart/form-data" class="form">
            {{ csrf_field() }}
            <div class="form-main">
                <div class="form-block">
                    <p>Введите код страницы<br>
                        <input type="text" name="code" size="10">
                    </p>
                    <p>Введите заголовок(имя собаки): <br>
                        <input type="text" name="title" size="255">
                    </p>
                    <p>Введите описание собаки: <br>
                        <textarea  name="description" cols="40" rows="5" maxlength="2000" >
                         </textarea>
                    </p>
                    <p>Введите пол собаки: <br>
                        <input type="text" name="sex" size="40">
                    </p>
                    <p>Вставьте картинку: <br>
                        <input type="file" name="image" width="50">
                    </p>
                </div>
            </div>
            <button class="admin-button add-but" type="submit">
                Добавить
            </button>
            <a class="admin-button cancle-but" href="{{route('admin.pages')}}">
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
