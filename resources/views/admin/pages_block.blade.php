@extends('admin.base')
{{--@section('title', "{{ $obj->title}}")--}}
@section('content')

    <div class="container">
        <h3 class="admin-panel__title" >Административная панель</h3>
        <ul class="admin-panel__list mytable" border="0"cellspacing="0">
            @foreach($obj as $k => $items)
                {{-- Start from root pages --}}
                @if($k != 'root')
                    @break
                @endif
                    @include('admin.page', ['items' => $items])
             @endforeach
        </ul>
    </div>

    @include('popup.popup')


@endsection

