<header class="header__sticky">
    <div class="header-navbar d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <ul>
                        <li class="font-weight-bold">
                            <a href="#">
                                @lang('client.seller-channel')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-4 text-right">
                    <ul>
                        <li><a href="#"><i class="far fa-question-circle"></i> @lang('client.help') </a></li>
                        <li class="font-weight-bold"><a href="#"> @lang('auth.register') </a></li>
                        <li class="font-weight-bold"><a href="#"> @lang('auth.login') </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    <div class="header-search">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center">
                    <a href="#" title="">Demo</a>
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
