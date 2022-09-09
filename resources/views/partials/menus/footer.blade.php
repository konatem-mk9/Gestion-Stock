<ul>
    @foreach($items as $menu_item)
        @if ($menu_item->title === 'FollowMe:')
            <li>{{ $menu_item->title }}</li>
        @endif
        <li><a href="{{ $menu_item->link() }}"></a></li>
       
    @endforeach
</ul>