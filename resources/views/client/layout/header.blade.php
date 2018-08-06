<header class="header__sticky">
    <div class="header-navbar d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <ul>
                        <li class="font-weight-bold">
                            <a href="{{ route('language.change', ['lang' => 'en']) }}" class="change-lang">
                                <img src="{{ asset('bower_components/sufee-admin-dashboard/images/flags/4x3/us.svg') }}" alt="">
                            </a>
                            <a href="{{ route('language.change', ['lang' => 'vi']) }}" class="change-lang">
                                <img src="{{ asset('bower_components/sufee-admin-dashboard/images/flags/4x3/vn.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-4 text-right">
                    <ul>
                        <li><a href="#"><i class="far fa-question-circle"></i> @lang('client.help') </a></li>
                        @if(!Auth::check())
                            <li class="font-weight-bold"><a href="{{ route('register') }}"> @lang('auth.register') </a></li>
                            <li class="font-weight-bold"><a href="{{ route('login') }}"> @lang('auth.login') </a></li>
                        @else
                        <li class="font-weight-bold"><a href="#"> {{ Auth::user()->name }} </a></li>
                        <li class="font-weight-bold"><a href="#" 
                            onclick="javascript:document.getElementById('logout').submit()"> @lang('auth.logout') </a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    {!! Form::open([
        'id' => 'logout',
        'method' => 'POST',
        'url' => route('logout'),
    ]) !!}
    {!! Form::close() !!}
    <div class="header-search">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="logo">
                </div>
                <div class="col-md-9">

                    {!! Form::open([
                        'route' => 'login',
                        'class' => 'search']) 
                    !!}

                    {!! Form::text('search', null, ['placeholder' => __('client.search')]) !!}
                    
                    {!! Form::button(__('client.search.submit'), 
                                    [
                                        'class' => 'search-submit', 
                                        'type' => 'submit'
                                    ])
                    !!}
                    
                    {!! Form::close() !!}

                </div>
                <div class="col-md-1 cart">
                    <button class="cart-icon"><i class="fas fa-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    </div>
</header>
