@extends('app')
@section('title', 'スレッド一覧')

@section('head')
    <link href="{{asset('css/thread_main.css')}}" rel="stylesheet">
    <script src="{{asset('js/thread_main.js')}}"></script>
@endsection

@section('content')

    @php
        $hasErr1 = count($errors) > 0;
        $hasErr2 = Session::has('error');
    @endphp

    @if ($hasErr1 or $hasErr2)
        <div class="alert alert-danger">
            <ul class="list-group">
                @if ($hasErr1)
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                @endif
                @if ($hasErr2)
                    @foreach (Session::get('error') as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    @endif

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

    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="col-12 text-right">
            <span>[{!! link_to_route('showThreadList', 'スレッド一覧へ') !!}]</span>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card" >
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-2">
                            @if ($thread->image_id !== null)
                                <a href="{{route('getImage', $thread->image_id)}}" target="_blank">
                                    <img class="img-fluid" style="max-width:100%; height:auto;" src="{{route('getImage', $thread->image_id)}}" alt="Card image cap">
                                </a>
                            @else
                                <img class="img-fluid" style="max-width:100%; height:auto;" src="/img/no_image.png">
                            @endif
                        </div>
                        <div class="col-sm-10">
                            <h2>{{$thread->title}}</h2>
                            <small class="text-muted">作成日時：{{$thread->created_at}}</small>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="card-text"><?php echo Markdown::convertToHtml($thread->text)?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a data-toggle="collapse" data-parent="#accordion" href="#deleteForm" aria-expanded="true" aria-controls="deleteForm">
                                <span>削除</span>
                            </a>
                            <div id="deleteForm" class="collapse" role="tabpanel" aria-labelledby="deleteForm">
                                {!! Form::open(['route' => ['deleteThread', $thread->id], 'files' => true, 'class' => 'form-inline pull-right']) !!}
                                    <div class="form-group">
                                        <label for="input-password-to-exec-delete" style="margin-right: 10px">削除パスワード</label>
                                        <input type="password" id="input-password-to-exec-delete" name="password" class="form-control" placeholder="Password" style="margin-right: 10px">
                                    </div>
                                    {!! Recaptcha::render() !!}
                                    <button type="submit" class="btn btn-primary">削除</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <div class="row">
        <div class="col-4">
            <span>[<a href="javascript:location.reload();">リロード</a>]</span>
        </div>
        <div class="col-8 text-right">
            <span>[{!! link_to_route('showThreadList', 'スレッド一覧へ') !!}]</span>
            <span>[<a href="#top">ページトップへ</a>]</span>
        </div>
    </div>
@endsection
