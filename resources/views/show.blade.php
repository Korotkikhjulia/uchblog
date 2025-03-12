@extends('layouts.app')

@section('title')
@parent :: {{ $product->title }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$product->title}}</div>
                <div class="card-body">
                    <a href="{{route('home')}}">Назад к постам</a>
                    <div class="card-title">
                        <h1 class="">{{ $product->title }}</h1>
                    </div>
                    <div class="card-content">
                        <p class="">{{ $product->created_at }}</p>
                    </div>
                    <div class="card-content">
                        <p class="">
                            {{ $product->content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection