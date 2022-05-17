@extends('layouts.main')

@section('title')
@parent - Отзыв
@endsection

@section('content')
    <div class="row">
        <form method="post" action="{{ route('user.feedback.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя пользователя</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="comment">Комментарий</label>
                <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                @error('comment') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit mb-3" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
