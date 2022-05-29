@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
                @error('author') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id === old('category_id')) selected @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'draft')   selected @endif>draft</option>
                    <option @if(old('status') === 'active')  selected @endif>active</option>
                    <option @if(old('status') === 'blocked') selected @endif>blocked</option>
                </select>
                @error('status') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="text">Текст</label>
                <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
                @error('text') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit mb-3" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
