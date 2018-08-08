<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container profile">
        <div class="profile__information">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ $user->getAvatar() }}" alt="" class="profile__avatar">
                </div>
                <div class="col-md-10 pl-5">
                    <p class="mb-1">
                        {{ $user->name }}
                    </p>
                    <div class="rate">
                        <span>
                            (2000)
                        </span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile__description">
            <p> {{ $user->description }} </p>
        </div>
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fas fa-map-marker-alt"></i> <span>{{ __('address') }}</span> {{ $user->address }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-phone"></i> <span>{{ __('phone') }}</span>{{ $user->phone }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-envelope"></i> <span>Email:</span> {{ $user->email }}
                </li>
                <li class="list-group-item">

                    <i class="fab fa-facebook"></i>
                    <span>Facebook:</span>
                    <a href="#">tiennguyensl</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
