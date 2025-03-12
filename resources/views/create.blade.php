@extends('layouts.app')

@section('title') @parent :: {{ $title}}
@endsection

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление поста</div>
                <div class="card-body">
                    <a href="{{route('home')}}">Назад к постам</a>
                    <form role="form" method="post" action="{{ route('store') }}" enctype="multipart/form-data" class="row edrow mt-2">
                        @csrf
                        @method('POST')
                        <div class="col-md-12">
                            <h1><input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Заголовок"></h1>
                        </div>
                        <div class="col-sm-12">
                            Содержание поста:
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Содержание поста"></textarea>
                            <hr>
                            <input type="hidden" name="product_id" value="id">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn2" type="submit">
                                    <i class="fa fa-file" aria-hidden="true"></i> Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection