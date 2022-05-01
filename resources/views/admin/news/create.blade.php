@extends('layouts.admin')

@push('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

  <div class="table-responsive">

    <div class="form-components">
        <form name="form-components" class="form-components__form">

            <h2 class="form__header">Заголовок</h2>
            <input type="text" class="form-components__input-text" placeholder="Заголовок" value="">

            <h2 class="form__header">Краткое описание новости</h2>
            <textarea  class="form-components__input-textarea" placeholder="Краткое описание новости"></textarea>

            <h2 class="form__header">Текст новости</h2>
            <textarea  class="form-components__input-textarea" placeholder="Текст новости"></textarea>

            <button type="submit" class="form-components__button-submit">Добавить</button>
        </form>
    </div>

  </div>
@endsection
