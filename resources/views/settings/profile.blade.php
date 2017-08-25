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
            <div class="card card-profile mb-4">
                <div class="card-header bg-danger"></div>
                <div class="card-block text-center">
                    <a href="#">
                        <img class="avatar card-profile-img" src="{{ asset('images/no-thumb.png') }}">
                    </a>

                    <div class="card-title my-2">
                        <a class="font-weight-bold text-inherit d-block" href="#">{{ $user -> display_name }}</a>
                        <span class="text-muted">&#64;{{ $user -> url_name }}</span>
                    </div>
                </div>
            </div>

            <div class="list-group mb-4">
                <a href="{{ url('account') }}" class="list-group-item list-group-item-action justify-content-between">
                    アカウント
                    <span class="icon icon-chevron-right"></span>
                </a>
            </div>

            <div class="list-group mb-4">
                <a href="{{ url('profile') }}" class="list-group-item list-group-item-action justify-content-between">
                    プロフィール
                    <span class="icon icon-chevron-right"></span>
                </a>
            </div>

            <div class="hidden-md-down">
                <div class="card card-link-list mb-4">
                    <div class="card-block">&copy; AsiaQuest Co., Ltd</div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header" style="background-color: #FFFFFF;">
                    <strong>プロフィール</strong>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group row {{ $errors->has('display_name') ? ' has-danger' : '' }}">
                            <label for="display_name" class="col-3 col-form-label">表示名</label>
                            <div class="col-9">
                                <input name="display_name" type="text" id="display_name" class="form-control"
                                       value="{{$user -> display_name}}">

                                @if ($errors->has('display_name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('avatar') ? 'has-danger' : '' }}">
                            <label for="avatar" class="col-3 col-form-label">アバター</label>
                            <div class="col-9">
                                <img src="{{ asset('images/no-thumb.png') }}" class="avatar">
                                <input name="avatar" type="file" id="avatar" class="form-control-file">

                                @if ($errors->has('avatar'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label for="description" class="col-3 col-form-label">自己紹介</label>
                            <div class="col-9">
                                <input name="description" type="text" id="description" class="form-control"
                                       value="{{ $user -> description }}" maxlength="160">

                                @if ($errors->has('description'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-success mt-4">保存する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="hidden-lg-up">
                <div class="card card-link-list mb-4">
                    <div class="card-block">&copy; AsiaQuest Co., Ltd</div>
                </div>
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

<script>
    $(function () {
        $('a[href="' + location.href + '"]').addClass('active');
    });
</script>

</body>
</html>
