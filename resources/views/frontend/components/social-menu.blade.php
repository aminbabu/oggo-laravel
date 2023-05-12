<ul>
    @foreach ($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                <i class="{{ $menu_item->icon_class }}"></i>
            </a>
        </li>
    @endforeach
</ul>
