@unless ($column->isEmpty())
    <ul class="category-tree">
        @foreach ($column as $column)
            <li>
                <span class="actions">
                    <a href="{{ route('admin.column.edit', [ $column->getKey() ]) }}" title="编辑栏目">
                        修改<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('admin.column.create', [ 'parent_id' => $column->getKey() ]) }}" title="添加栏目">
                        添加<span class="glyphicon glyphicon-plus"></span>
                    </a>
                </span>
                <a href="{{ route('admin.column.show', [ $column->getKey() ]) }}" class="title">
                    {{ $column->title }}
                </a>
                @include('admin.column.partials.tree', [ 'column' => $column->children ])
            </li>
        @endforeach
    </ul>
@endunless