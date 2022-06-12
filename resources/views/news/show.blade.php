@extends('layouts.main')

@section('title')
@parent - Новости
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <div class="col">
        <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="{{ Storage::url($news['image']) }}" style="width:200px;">

            <div class="card-body">
                <h1 style="font-size: 24px;">{{$news['title']}}</h1>
                <p class="card-text">{{$news['text']}}</p>
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Автор: {{$news['author']}}</small>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
