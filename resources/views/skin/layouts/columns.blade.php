@unless ($column->isEmpty())
    @foreach ($column as $column)
        <li style="padding-left: 20px;">
            <a href="{{url('/column/'.$column->getKey())}}" class="title">{{ $column->title }}</a>
            @include('skin.layouts.column', [ 'column' => $column->children ])
        </li>
    @endforeach
@endunless