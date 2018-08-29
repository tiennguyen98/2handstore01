@component('mail::message')

<h1>{{ __(':greet', ['greet' => __('Hello')]) }}</h1>
<p>{{ __('Your purchase has been eject:') }} <b>{{ $product->name }}</b></p>
<p>{{ __('Deal: ') }} <b>{{ $order->money }}</b></p>
<p>{{ __('By: ') }} <b>{{ $product->user->email }}</b></p>

@component('mail::button', ['url' => route('client.myproduct.index')])
{{ __('Click here to view') }}
@endcomponent

<p>{{ __('Thank you for using our application!') }}</p>
{{ __('regards') }}<br>
{{ config('app.name') }}

@endcomponent
