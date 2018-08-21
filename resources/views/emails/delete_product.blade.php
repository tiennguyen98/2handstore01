@component('mail::message')

<h1>{{ __(':greet', ['greet' => __('Hello')]) }}</h1>
<p>{{ __('Your product was removed by administrator: ') . $product->name }}</p>

@component('mail::button', ['url' => route('index')])
{{ __('Contact Us') }}
@endcomponent

<p>{{ __('Thank you for using our application!') }}</p>
{{ __('regards') }}<br>
{{ config('app.name') }}

@endcomponent
