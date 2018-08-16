<div class="product-box col-xl-2 col-md-4 col-6">
    <a href="{{ route('client.products.show', ['id' => $product->id]) }}" class="item">
        <img src="{{ $product->thumbnail() }}" alt="">
        <p class="text-truncate">{{ $product->name }}</p>
        <div class="item__foot">
            <div class="place text-right">
                <i class="fas fa-map-marker-alt"></i> {{ $product->province->city->name }}
            </div>
            <b>{{ $product->money }}</b>
        </div>
    </a>
</div>
