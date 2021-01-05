@extends('admin_base')
{{--@section('title', "{{ $obj->title}}")--}}
@section('content')

<div class="container">
    <h3 class="admin-panel__title" >Административная панель</h3>
    <table class="admin-pannel__table" border="0"cellspacing="0">
        <tr>
            <th align="left">
                Список щенков
            </th>
            <th colspan="3" align="right" class="action-td">
                <a href="{{route("puppies.add")}}">
                    <img src="{{asset('img/add.svg')}}" alt="Add">
                </a>

            </th>
        </tr>
        @foreach($puppies as $puppy)
        <tr>
            <td>
                {{$puppy->title}}
            </td>
            <td class="action-td">
                <a href="{{"/puppies/$puppy->code"}}">
                    Show
                </a>
            </td>
            <td class="action-td">
                <a href="{{"/admin/pages/puppies/edit/$puppy->code"}}">
                    <img src="{{asset('img/edit.svg')}}"  alt="Edit">
                </a>

            </td>
            <td class="action-td">
                <a href="{{"/admin/pages/puppies/delete/$puppy->code"}}">
                    <img src="{{asset('img/remove.svg')}}"  alt="Remove">
                </a>

            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
