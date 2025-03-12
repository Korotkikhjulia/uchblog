@extends('layouts.app')

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
                <div class="card-header">Посты</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @auth
                    <div class="d-flex justify-content-between">
                        Welcome, {{Auth::user()->name}}
                        <a class="col-3 color3" href="{{ route('create') }}">Добавить пост</a>
                    </div>
                    @endif

                    <label for="search" class="mt-3">Поиск:</label>
                    <!-- Поле поиска -->
                    <input type="text" id="search" class="form-control mb-3" placeholder="Поиск по заголовку..." name="search">

                    <!-- Пустой контейнер, который будет заполняться AJAX -->
                    <div id="posts-container"></div>
                    <hr>
                    <!-- Элементы управления сортировкой -->
                    <form method="get" action="{{ route('home') }}">
                        <div class="form-group">
                            <label for="sort">Сортировка:</label>
                            <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                                <option value="created_at" {{ $sort == 'created_at' ? 'selected' : '' }}>Дата</option>
                                <option value="title" {{ $sort == 'title' ? 'selected' : '' }}>Заголовок</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="order">Направление сортировки:</label>
                            <select name="order" id="order" class="form-control" onchange="this.form.submit()">
                                <option value="asc" {{ $order == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                                <option value="desc" {{ $order == 'desc' ? 'selected' : '' }}>По убыванию</option>
                            </select>
                        </div>
                    </form>
                    <hr>
                    <div class="mt-4">
                        <ul class="list-group">
                            @foreach ($posts as $post)
                            <li class="list-group-item">
                                <div class="post-card">
                                    <div class="card-cont">
                                        <div class="overflow-hidden text-ellipsiscon card-title">
                                            <a href="{{ route('products.show', ['id' => $post->id]) }}"
                                                class="">{{ $post->title }}</a>
                                            @auth
                                            <a href=" {{ route('auth.edit', ['auth' => $post->id]) }}" class="ms-2">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                            </a>
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-id="{{ $post->id }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="card-content">
                                            <p class="">{{ $post->created_at }}</p>
                                        </div>
                                        <div class="card-content overflow-hidden text-ellipsiscon">
                                            <p class="">{{ $post->content }}</p>
                                        </div>
                                    </div>
                                </div><!-- /post-card -->
                            </li>

                            <div class='w-75 mrg'>
                                <div class="mt-3">
                                    <h5>Комментарии:</h5>
                                    <!-- Список комментариев -->
                                    <div class="mt-3">
                                        @foreach($post->comments as $comment)
                                        <div class="comment">
                                            <div class="row">
                                                <div class="col">
                                                    <p><strong>{{ $comment->user->name }}</strong></p>
                                                </div>
                                                <div class="col-auto ml-auto">
                                                    @if(auth()->check() && auth()->user()->id == $comment->user_id)
                                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <p>{{ $comment->content }}</p>
                                            <hr>
                                        </div>
                                        @endforeach
                                    </div>
                                    <form method="POST" action="{{ route('comments.store', $post->id) }}">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-10 ">
                                                <div class="form-group">
                                                    <textarea name="content" class="form-control" rows="3" placeholder="Ваш комментарий..." required></textarea>
                                                </div>
                                            </div>
                                            <div class="ml-auto col-auto">
                                                <button type="submit" class="btn btn-primary mt-2 mb-2"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </ul>
                    </div>


                    <div class="post-cards mt-5">
                        <div class="">
                            @foreach ($posts as $post)

                            @endforeach
                        </div>
                    </div><!-- /post-card -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Окно подтверждения</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены, что хотите удалить этот пост?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                <form id="deleteForm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Да</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection