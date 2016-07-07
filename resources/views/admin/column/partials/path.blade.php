<ol class="breadcrumb">
    @foreach ($column->getAncestors() as $ancestor)
        <li><a href="{{ route('admin.column.show', [ $ancestor->getKey() ]) }}">{{ $ancestor->title }}</a></li>
    @endforeach
    <li class="active">{{ $column->title }}</li>
</ol>