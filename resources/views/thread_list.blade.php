<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether-theme-arrows-dark.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1>エンジニアの集い</h1>
            {!! Form::open(['route' => 'addThread', 'files' => true]) !!}
                <h2>スレッドを作成する</h2>
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
                <button type="submit" class="btn btn-primary">作成</button>
            {!! Form::close() !!}

            <h2>スレッド一覧</h2>
            <div class="card-group">
                @foreach ($threads as $thread)
                    <div class="card">
                        @if ($thread->image_id === null)
                            <img class="card-img-top" src="img/no_image.png" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="{{route('getImage', $thread->image_id)}}" alt="Card image cap">
                        @endif
                        <div class="card-block">
                            <h3 class="card-title">{{$thread->title}}</h3>
                            <p class="card-text">{{$thread->text}}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{$thread->updated_at}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
