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

@include('components.navbar')

<div class="container pt-4">
    <div class="row">
        <div class="col-lg-3">
            @include('components.userInfo',['authUser'=>$user])
        </div>

        <div class="col-lg-6">
            <ul class="list-group media-list-stream mb-4">
                <li class="media list-group-item p-4 {{ $errors->has('body') ? 'has-danger' : '' }}">
                    <form method="POST" action={{url('home')}} class="input-group">
                        {{ csrf_field() }}

                        <input name="body" type="text" class="form-control" placeholder="いまどうしてる？">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-secondary">
                                <span class="icon icon-new-message"></span>
                            </button>
                        </div>
                    </form>

                    @if($errors->has('body'))
                        <div class="form-control-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </div>
                    @endif
                </li>
            </ul>
            @include('components.tweet')
        </div>

        <div class="col-lg-3">
            <div class="card card-link-list mb-4">
                <div class="card-block">&copy; AsiaQuest Co., Ltd</div>
            </div>
        </div>

    </div>
</div>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

</body>
</html>
