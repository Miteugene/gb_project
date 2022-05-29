@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Название категории</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit mb-3" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
