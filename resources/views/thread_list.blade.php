<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1>エンジニアの集い</h1>
            {!! Form::open(['route' => 'addThread']) !!}
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
        </div>
    </body>
</html>
