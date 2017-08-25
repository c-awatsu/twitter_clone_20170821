<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Entypo CSS -->
    <link href="{{ asset('css/entypo.css') }}" rel="stylesheet">

    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
</head>
<body class="application">

<ul class="list-group media-list-stream mb-4">
    <li class="media list-group-item p-4">
        @if(count($sortedTweets) > 0)
            @foreach($sortedTweets as $tweet)
                <article class="d-flex w-100" style="border:#dddddd solid 1px">
                    <a class="font-weight-bold text-inherit d-block" href="#">
                        <img class="media-object d-flex align-self-start mr-3"
                             src="{{ asset('images/no-thumb.png') }}">
                    </a>
                    <div class="media-body">
                        <div class="mb-2">
                            <a class="text-inherit" href="{{ url("{$tweet->tweetUser->url_name}/profile") }}">
                                <strong>{{ $tweet->tweetUser->url_name }}</strong>
                                <span class="text-muted">&#64;{{ $tweet->tweetUser->url_name }}</span>
                            </a>
                            -
                            <time class="small text-muted">{{ $tweet -> created_at }}</time>
                        </div>
                        <p>
                            {{ $tweet -> body }}
                        </p>
                    </div>
                </article>
            @endforeach
        @else
            <strong>ツイートはまだありません</strong>
        @endif
    </li>
</ul>

</body>
</html>
