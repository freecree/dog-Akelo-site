@extends('base')
@section('title', 'events')
@section('class-header-sub', 'header-subpages')
@section('content')
<section class="page events-page">
    <div class="container1">
        <div class="page__heading">
            <div class="breadcrump">
{{--                {{$items = $obj->breadCramp()}}--}}
                <a href="/">Главная</a>
                @foreach($obj->breadCramp() as $item)
                    / <a href="/{{$item->getRoute()}}">{{$item->title}}</a>
                @endforeach
            </div>
            <h2 class="section__title events__title">
                {{$obj->title}}
            </h2>
        </div>
        <div class="events-block">
            @foreach($obj->items as $val )
                <div class="event">
                    <div class="event__photo event__photo-left">
                        <a href="/{{$val->getRoute()}}">
                            <img src="{{asset("img/{$val->image_main}")}}" alt="Best">
                        </a>

                        <div class="event-bg event-bg-left"></div>
                    </div>
                    <div class="event__text event__text-left">
                        <div class="event__date">
                            {{date('Y-m-d', strtotime($val->event_date))}}
                        </div>
                        <div class="event__heading">
                            <h3 class="event__title smile-title">
                                {{$val->title}}
                            </h3>

                        </div>
                        <div class="event__content">
                            {!! $val->description !!}
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
