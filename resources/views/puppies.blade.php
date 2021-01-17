@extends('base')
@section('title', 'puppies')
@section('class-header-sub', 'header-subpages')
@section('content')
    <section class="page catalog-page">
        <div class="page__heading">
            <div class="container">
                <div class="breadcrump">
                    <a href="/">Главная</a>
                    @foreach($obj->breadCramp() as $item)
                        / <a href="/{{$item->getRoute()}}">{{$item->title}}</a>
                    @endforeach
                </div>
                <h2 class="section__title page__title">
                    {{$obj->title}}
                </h2>
            </div>
        </div>
        <div class="pedigree-picture">
        </div>

        <div class="puppies">
            <div class="container">
                <div class="puppies__block">
                    @foreach($obj->items as $val )
                    <div class="puppies__puppy">
                        <a href="{{$val->getRoute()}}" class="puppy__photo restful">
                            <img src="{{asset("img/{$val->image_main}")}}" alt="pappy-photo">
                        </a>
                        <div class="puppy__caption">
                            <div class="puppy__name">
                                {{$val->title}}
                            </div>
                            <div class="puppy__sex">
                                {{$val->sex}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="puppies__puppy">
                    </div>
                </div>
            </div></div>
    </section>
@endsection
