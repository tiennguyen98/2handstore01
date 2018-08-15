<table class="table">
    <thead>
        <th>@lang('Num.')</th>
        <th>@lang('admin.category.name')</th>
        <th>@lang('admin.category.slug')</th>
        <th>@lang('admin.category.thumbnail')</th>
        <th>@lang('admin.category.parent')</th>
    </thead>
    <tbody>
        @php($i = --$page + 1)
        @forelse($categories as $category)
            <tr class="table-primary">
                <td>{{ $i++ }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td><img src="{{ $category->getThumbnail() }}" alt="{{ __('thumbnail') }}" class="thumbnail"></td>
                <td>{{ __('no') }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                    <button onclick="destroy('{{ route('admin.categories.destroy', ['id' => $category->id]) }}', '{{ __('Do you really want to delete this item?') }}')" class="delete btn btn-danger">{{ __('Delete') }}</button>
                </td>
            </tr>
            <div>
                @foreach($category->categories as $cate)
                    <tr class="table-secondary">
                        <td>{{ $i++ }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->slug }}</td>
                        <td><img src="{{ $cate->getThumbnail() }}" alt="{{ __('thumbnail') }}" class="thumbnail"></td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['id' => $cate->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            <button onclick="destroy('{{ route('admin.categories.destroy', ['id' => $cate->id]) }}', '{{ __('Do you really want to delete this item?') }}')" class="delete btn btn-danger">{{ __('Delete') }}</button>
                        </td>
                    </tr>
                @endforeach
            </div>
        @empty
            <tr>
                <td colspan="5">@lang('No Data')</td>
            </tr>
        @endforelse
    </tbody>
</table>
