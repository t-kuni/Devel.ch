@extends('app')
@section('title', 'スレッド一覧')

@section('head')
    <meta name="description" content="{{config('app.name')}}はエンジニア(情報技術者)向けの匿名掲示板です。最新の情報技術に関する雑談等に活用してください">

    <link href="{{asset('css/thread_list.css')}}" rel="stylesheet">
    <script src="{{asset('js/thread_list.js')}}"></script>
@endsection

@section('content')

    @php
        $hasErr1 = count($errors) > 0;
        $hasErr2 = Session::has('error');
        $hasErr = $hasErr1 or $hasErr2;
    @endphp

    @if ($hasErr)
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

    <p>{{config('app.name')}}(通称：デヴちゃん)はエンジニア向けの匿名掲示板です。<br/>応援してくださいね☆</p>
    <div class="card">
        <div class="card-header">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>スレッドを作成する</span>
            </a>
        </div>

        <div id="collapseOne" class="collapse {{$hasErr ? 'show' : ''}}" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block">
                {!! Form::open(['route' => 'addThread', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="input-title">タイトル</label>
                        <input type="text" id="input-title" name="title" class="form-control" placeholder="タイトル" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="input-text">本文</label>
                        <textarea name="text" class="form-control" id="input-text" rows="5">{{old('text')}}</textarea>
                        <small id="textHelp" class="form-text text-muted">Markdown記法対応</small>
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
                    <button type="submit" class="btn btn-primary save-pw-to-cookie">作成</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <h2 style="margin-top: 20px">スレッド一覧</h2>
    <div class="card-group">
        @foreach ($threads as $thread)
            <div class="card">
                @if ($thread->image_id === null)
                    <img class="img-fluid" style="max-width:100%; height:auto" src="img/no_image.png">
                @else
                    <img class="img-fluid" style="max-width:100%; height:auto" src="{{route('getImage', $thread->image_id)}}" alt="Card image cap">
                @endif
                <div class="card-block">
                    <h3 class="card-title">{{$thread->title}}</h3>
                    <p class="card-text"><?php echo Markdown::convertToHtml($thread->text)?></p>
                    {!! link_to_route('showThread', '閲覧する', [$thread->id], ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="card-footer">
                    <small class="text-muted">作成日 {{$thread->updated_at}}</small>
                </div>
            </div>
        @endforeach
    </div>
    <span>[<a href="#top">トップへ</a>]</span>
@endsection
