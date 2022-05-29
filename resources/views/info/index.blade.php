@extends('layouts.main')

@section('title')
@parent - Информация
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <h1>Главная</h1>

    <x-main.menu></x-main.menu>

</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">

    @forelse($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="{{$news['image']}}" style="width:200px;" alt="image">

                <div class="card-body">
                    <p class="card-text">{{$news['title']}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{route('news.show', ['catSlug' => $news['category']['slug'], 'newsSlug' => $news['slug']])}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                        <small class="text-muted">Автор: {{$news['author']}}</small>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse

</div>
@endsection
