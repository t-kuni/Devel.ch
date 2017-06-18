@extends('app')
@section('title', 'スレッド一覧')

@section('content')
    <div class="card">
        <div class="card-header">
            <span>コメントする</span>
        </div>
        <div class="card-block">
            {!! Form::open(['route' => ['postComment', $thread->id], 'files' => true]) !!}
                <div class="form-group">
                    <label for="input-name">名前</label>
                    <input type="text" id="input-name" name="name" class="form-control" placeholder="名前">
                    <small id="nameHelp" class="form-text text-muted">省略可</small>
                </div>
                <div class="form-group">
                    <label for="input-text">本文</label>
                    <textarea name="text" class="form-control" id="input-text" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="input-password">削除パスワード</label>
                    <input type="password" id="input-password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="input-image">画像</label>
                    <input type="file" name="image" class="form-control-file" id="input-image" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">省略可</small>
                </div>
                <button type="submit" class="btn btn-primary">コメント</button>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card" style="margin-top: 20px">
        <div class="card-header">
            <h2>{{$thread->title}}</h2>
            <small class="text-muted">作成日時：{{$thread->created_at}}</small>
        </div>
        <div class="card-block">
            <p class="card-text">{{$thread->text}}</p>
        </div>
    </div>
    @foreach ($thread->comments as $comment)
        <div class="card">
            <div class="card-header">
                <span>名前：{{$comment->name}}</span>
                <small class="text-muted">日時：{{$comment->created_at}}</small>
            </div>
            @if ($comment->image_id !== null)
                <img class="rounded float-left" style="width: 200px" src="{{route('getImage', $comment->image_id)}}" alt="Card image cap">
            @endif
            <div class="card-block">
                <p class="card-text">{{$comment->text}}</p>
            </div>
        </div>
    @endforeach
@endsection
