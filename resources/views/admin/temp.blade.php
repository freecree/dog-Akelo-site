<li>
    <div class="list-container">
        <div align="left">
            {{$item->title}}
        </div>
        <div class="right">
            <div class="action-td">
                <a href="#">
                    Show
                </a>
            </div>
            <div class="action-td">
                <a href="#">
                    <img src="{{asset('img/edit.svg')}}"  alt="Edit">
                </a>

            </div>
            @if($item->parent_code == 'root')
                <div align="right" class="action-td">
                    <a href="/admin/page/create?parent={{$item->parent_code}}">
                        <img src="{{asset('img/add.svg')}}" alt="Add">
                    </a>

                </div>
            @else
                <div class="action-td">
                    <a href="{{"/admin/page/$item->code"}}">
                        @method('delete')
                        <img src="{{asset('img/remove.svg')}}"  alt="Remove">
                    </a>

                </div>
            @endif
        </div>
    </div>


    @if(isset($obj[$item->code]))
        <ul class="admin-panel__list children>
            <li>
                yew li
            </li
{{--            @include('admin.page', ['items' => $obj[$item->code]])--}}
        </ul>

    @endif
</li>
