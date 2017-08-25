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
    <div class="card card-profile mb-4">
        <div class="card-header bg-danger"></div>
        <div class="card-block text-center">
            <a href="#">
                <img class="avatar card-profile-img" src="{{ asset('images/no-thumb.png') }}">
            </a>

            <div class="card-title my-2">
                <a href="#" class="font-weight-bold text-inherit d-block">
                    {{$user -> display_name }}
                </a>
                <a href="#" class="text-inherit text-muted">
                    &#64;{{$user ->url_name }}
                </a>
            </div>

            <p class="mb-4">{{$user -> description }}</p>

            <ul class="card-profile-stats">
                <li class="card-profile-stat">
                    <a href={{ url("{$user -> url_name}/following") }} class="text-inherit">
                        <span class="text-muted">フォロー</span>
                        <strong class="d-block">{{ $user -> following -> count() }}</strong>
                    </a>
                </li>
                <li class="card-profile-stat">
                    <a href={{url("{$user -> url_name}/followers") }} class="text-inherit">
                        <span class="text-muted">フォロワー</span>
                        <strong class="d-block">{{ $user ->  followers -> count() }}</strong>
                    </a>
                </li>
            </ul>
            <span class="align-content-center">
                        @if(!$authUser->is($user))
                    @if($authUser->isFollowing($user))
                        <form action="{{ url("{$user->url_name}/unFollow") }}" method="POST">
                                {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-outline-danger btn-sm following"
                                    style="width: 6rem; height: 2.4rem;">
                                    <span>フォロー中</span>
                                    <span>解除</span>
                                </button>
                            </form>
                    @else
                        <form action="{{ url("{$user->url_name}/follow") }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-primary btn-sm"
                                    style="width: 6.5rem; height: 2.4rem;">フォローする</button>
                            </form>
                    @endif
                @endif
            </span>
        </div>
    </div>

</body>
</html>

