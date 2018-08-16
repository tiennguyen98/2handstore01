@forelse($products as $product)
    @include('client.components.product_normal')
@empty
    @lang('client.empty')
@endforelse
