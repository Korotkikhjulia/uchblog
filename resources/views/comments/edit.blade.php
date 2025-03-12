@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование комментария</div>
                <div class="card-body">
                    <a href="{{route('home')}}">Назад к постам</a>
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Обновить комментарий</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection