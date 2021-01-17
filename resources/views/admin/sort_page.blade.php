@extends('admin.base')
{{--@section('title', "{{ $obj->title}}")--}}
@section('content')
    <div class="container">
        <h3 class="admin-panel__title" >Сортировка</h3>
        <form action="/admin/page/sort" method="post" class="form">
            {{ csrf_field() }}
            <div class="flex-wrapper">
                <table class="sort-table" border="1" cellspacing="0">
                    <tr>
                        <th>
                            Порядок
                        </th>
                        <th>
                            Название страницы
                        </th>
                    </tr>
                    <input hidden type="text" name="parent_code" value="{{$objects[0]->parent_code}}" >
                    @foreach($objects as $obj)
                        <tr>
                            <td>
                                <input class="num-input" type="number" name="{{$obj->id}}">
                            </td>
                            <td>
                                {{$obj->title}}
                            </td>
                        </tr>


                    @endforeach
                </table>

                <button class="admin-button sort-button" type="submit">
                    Сортировать
                </button>
            </div>


        </form>

@endsection
