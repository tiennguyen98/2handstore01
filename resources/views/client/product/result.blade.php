<div>
    @forelse($products as $product)
        <a href="{{ route('client.products.show', ['id' => $product->id]) }}">
            <div class="form-group row">
                <div class="col-md-2">
                    {{ Html::image($product->thumbnail(), 'thubnail', ['class' => 'search-thumbnail']) }}
                </div>
                <div class="col-md-7">
                    <p>{{ $product->name }}</p>
                </div>
            </div>
        </a>
    @empty

    @endforelse
</div>
