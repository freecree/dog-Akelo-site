@foreach($items as $item)
    <tr>
        <td align="left">
            {{$item->title}}
        </td>
        <td class="action-td">
            <a href="#">
                Show
            </a>
        </td>
        <td class="action-td">
            <a href="#">
                <img src="{{asset('img/edit.svg')}}"  alt="Edit">
            </a>

        </td>
        @if($item->parent_code == 'root')
            <td align="right" class="action-td">
                <a href="/admin/page/create?parent={{$item->parent_code}}">
                    <img src="{{asset('img/add.svg')}}" alt="Add">
                </a>

            </td>
        @else
            <td class="action-td">
                <a href="{{"/admin/page/$item->code"}}">
                    @method('delete')
                    <img src="{{asset('img/remove.svg')}}"  alt="Remove">
                </a>

            </td>
        @endif

    </tr>
    @if(isset($obj[$item->code]))
        @include('admin.page', ['items' => $obj[$item->code]])
    @endif
@endforeach
