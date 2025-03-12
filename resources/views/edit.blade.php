@extends('layouts.app')

@section('title')
@parent :: {{ $product->title }}
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
                <div class="card-header">Редактирование поста "{{ $product->title }}"</div>
                <div class="card-body">
                    <a href="{{route('home')}}">Назад к постам</a>
                    <form role="form" method="post" action="{{ route('auth.update', ['auth' => $product->id]) }}"
                        enctype="multipart/form-data" class="row edrow mt-2">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <h1><input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    id="title" value="{{ $product->title }}"></h1>
                        </div>
                        <div class="col-sm-8">
                            <ul class="list-unstyled">
                                <li>
                                    Описание:
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3"> {{ $product->content }}</textarea>
                                </li>
                            </ul>
                            <hr>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="input-group-append">
                                <button class="btn mybtn" type="submit">
                                    <i class="fa fa-file" aria-hidden="true"></i> Сохранить изменения
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