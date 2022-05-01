@extends('layouts.main')

@section('title')
@parent - Информация
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <h1>Информация</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <div class="col">
            <div class="card shadow-sm">
                <a href="{{route('news.categories')}}" class="btn btn-sm btn-outline-secondary">Категории новостей</a>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
                <a href="{{route('admin.index')}}" class="btn btn-sm btn-outline-secondary">Админка</a>
            </div>
        </div>

    </div>

</div>
@endsection
