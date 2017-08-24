<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<body class="application">
<div class="col-lg-12">
    <ul class="row list-unstyled">
        @foreach($profiles as $profile)
            <li class="col-xl-4 col-md-6">
                <div class="card card-profile mb-4">
                    <div class="card-header bg-danger"></div>
                    <div class="card-block">
                        <a href="#">
                            <img class="avatar card-profile-img" src="{{ asset('images/no-thumb.png') }}">
                        </a>

                        <span class="float-right">
                            @if($authUser->followers->find($profile))
                                <form action="#" method="POST">
                                {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-outline-danger btn-sm following"
                                            style="width: 6rem; height: 2.4rem;">
                                    <span>フォロー中</span>
                                    <span>解除</span>
                                </button>
                            </form>
                            @else
                                <form action="#" method="POST">
                            {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-primary btn-sm"
                                            style="width: 6.5rem; height: 2.4rem;">フォローする</button>
                            </form>
                            @endif
                        </span>

                        <strong class="card-title d-block">
                            <a class="text-inherit"
                               href={{ url("{$profile -> url_name}/profile") }}>{{ $profile -> display_name }}</a>
                        </strong>

                        <p class="mb-4">
                            {{ $profile -> description }}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="hidden-lg-up">
        <div class="card card-link-list mb-4">
            <div class="card-block">&copy; AsiaQuest Co., Ltd</div>
        </div>
    </div>
</div>
</body>
</html>

