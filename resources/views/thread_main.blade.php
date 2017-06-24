@extends('app')
@section('title', 'スレッド一覧')

@section('head')
    <link href="{{asset('css/thread_main.css')}}" rel="stylesheet">
    <script src="{{asset('js/thread_main.js')}}"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>コメントする</span>
            </a>
        </div>
        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
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
                    {!! Recaptcha::render() !!}
                    <button type="submit" class="btn btn-primary">コメント</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <span>[{!! link_to_route('showThreadList', 'スレッド一覧へ') !!}]</span>

    <div class="card" style="margin-top: 20px; margin-bottom: 10px;">
        <div class="card-header">
            <div class="row">
                <div class="col-xs-1">
                    <div style="margin-right:10px">
                        @if ($thread->image_id !== null)
                            <a href="{{route('getImage', $thread->image_id)}}" target="_blank">
                                <img class="img-fluid" style="max-width:100px; height:auto;" src="{{route('getImage', $thread->image_id)}}" alt="Card image cap">
                            </a>
                        @else
                            <img class="img-fluid" style="max-width:100px; height:auto;" src="/img/no_image.png">
                        @endif
                    </div>
                </div>
                <div class="col-xs-11">
                    <h2>{{$thread->title}}</h2>
                    <small class="text-muted">作成日時：{{$thread->created_at}}</small>
                </div>
            </div>
        </div>
        <div class="card-block">
            <p class="card-text"><?php echo Markdown::convertToHtml($thread->text)?></p>
        </div>
    </div>

    @foreach ($thread->comments as $comment)
        <div class="card" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="card-header">
                <span>名前：{{$comment->name}}</span>
                <small class="text-muted">日時：{{$comment->created_at}}</small>
            </div>
            @if ($comment->image_id !== null)
                <a href="{{route('getImage', $comment->image_id)}}" target="_blank">
                    <img class="img-fluid" style="max-width:200px; height:auto;" src="{{route('getImage', $comment->image_id)}}" alt="Card image cap">
                </a>
            @endif
            <div class="card-block">
                <p class="card-text"><?php echo Markdown::convertToHtml($comment->text)?></p>
            </div>
        </div>
    @endforeach

    <span>[{!! link_to_route('showThreadList', 'スレッド一覧へ') !!}]</span>
    <span>[<a href="#top">トップへ</a>]</span>
@endsection
