@extends('app')
@section('title', 'スレッド一覧')

@section('head')
    <link href="{{asset('css/thread_list.css')}}" rel="stylesheet">
    <script src="{{asset('js/thread_list.js')}}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span>スレッドを作成する</span>
        </div>
        <div class="card-block">
            {!! Form::open(['route' => 'addThread', 'files' => true]) !!}
                <div class="form-group">
                    <label for="input-title">タイトル</label>
                    <input type="text" id="input-title" name="title" class="form-control" placeholder="タイトル">
                </div>
                <div class="form-group">
                    <label for="input-password">削除パスワード</label>
                    <input type="password" id="input-password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="input-text">本文</label>
                    <textarea name="text" class="form-control" id="input-text" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="input-image">画像</label>
                    <input type="file" name="image" class="form-control-file" id="input-image" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">省略可</small>
                </div>
                {!! Recaptcha::render() !!}
                <button type="submit" class="btn btn-primary">作成</button>
            {!! Form::close() !!}
        </div>
    </div>

    <h2>スレッド一覧</h2>
    <div class="card-group">
        @foreach ($threads as $thread)
            <div class="card">
                @if ($thread->image_id === null)
                    <img class="rounded float-left" style="width: 200px" src="img/no_image.png" alt="Card image cap">
                @else
                    <img class="rounded float-left" style="width: 200px" src="{{route('getImage', $thread->image_id)}}" alt="Card image cap">
                @endif
                <div class="card-block">
                    <h3 class="card-title">{{$thread->title}}</h3>
                    <p class="card-text">{!!$thread->text!!}</p>
                    {!! link_to_route('showThread', '閲覧する', [$thread->id], ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="card-footer">
                    <small class="text-muted">作成日 {{$thread->updated_at}}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection
