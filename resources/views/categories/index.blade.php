@extends('layouts.main')

@section('title')
@parent - Категории
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @forelse($categoriesList as $category)
        <div class="col">
            <div class="card shadow-sm">
                <a href="{{route('news.news', ['catId' => $category['catId'] ])}}" class="btn btn-sm btn-outline-secondary">{{$category['title']}}</a>
            </div>
        </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
</div>
@endsection
