<ul>
    @foreach ($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}"
                {{ Route::current()->getName() === $menu_item->route ? 'class=active' : '' }}>{{ $menu_item->title }}</a>
        </li>
    @endforeach
</ul>
