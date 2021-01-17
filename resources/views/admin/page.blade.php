@foreach($items as $item)
    <li>
        <div class="list-wrapper">

            <div align="left">
                {{$item->title}}
            </div>
            <div class="right">
                @if($item->children())
                    <div class="action-td">
                        <a href="/admin/page/sort?code={{$item->code}}">
                            Сортировать
                        </a>
                    </div>
                @endif
                <div class="action-td">
                    <a href="/{{$item->getRoute()}}">
                        Смотреть
                    </a>
                </div>
                <div class="action-td">
                    <a href="/admin/page/{{$item->code}}/edit">
                        <img src="{{asset('img/edit.svg')}}"  alt="Edit">
                    </a>
                </div>
                @if($item->parent_code == 'root')
                    <div align="right" class="action-td">
                        <a href="/admin/page/create?code={{$item->code}}">
                            <img src="{{asset('img/add.svg')}}" alt="Add">
                        </a>

                    </div>
                @else

                    <div class="action-td">
                        <form action="{{"/admin/page/$item->code"}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" >
                                <img src="{{asset('img/remove.svg')}}"  alt="Remove">
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @if(isset($obj[$item->code]))
            <ul class="admin-panel__list children">
                @include('admin.page', ['items' => $obj[$item->code]])
            </ul>

        @endif
    </li>

@endforeach
