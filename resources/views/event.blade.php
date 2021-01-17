@extends('base')
@section('title', 'events')
@section('class-header-sub', 'header-subpages')
@section('content')
    <section class="page events-page">
        <div class="container1">
            <div class="page__heading">
                <div class="breadcrump">
                    <a href="/">Главная</a>
                     @foreach($obj->breadCramp() as $item)
                        / <a href="/{{$item->getRoute()}}">{{$item->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="events-block">
                <div class="event">
                    <div class="event__photo event__photo-left">
                        <a href="/{{$obj->getRoute()}}">
                            <img src="{{asset("img/{$obj->image_main}")}}" alt="Best">
                        </a>

                        <div class="event-bg event-bg-left"></div>
                    </div>
                    <div class="event__text event__text-left">
                        <div class="event__date">
                            {{date('Y-m-d', strtotime($obj->event_date))}}
                        </div>
                        <div class="event__heading">
                            <h3 class="event__title smile-title">
                                {{$obj->title}}
                            </h3>

                        </div>
                        <div class="event__content">
                            {!! $obj->description !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
