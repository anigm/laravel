@unless ($column->isEmpty())
    @foreach ($column as $column)
        <li>
            <a href="{{ route('admin.column.show', [ $column->getKey() ]) }}" class="title">{{ $column->title }}</a>
            @include('admin.column.partials.trees', [ 'column' => $column->children ])
        </li>
    @endforeach
@endunless