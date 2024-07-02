<!-- navigation start -->
<nav id="service-section">
    <div class="logo">
        <a href="{{ route('frontend.home') }}">
            <img src="{{ asset('uploads/config/' . getConfig('site-logo')) }}" alt="ENDEAVOR Nepal">
        </a>
    </div>
    <input type="checkbox" id="check">
    <label for="check">
        <div class="menu-toggle">&#9776;</div>
        <div class="close-button">&times;</div>
    </label>
    <ul class="nav-links">
        @foreach ($menus as $menu)
            @if (count($menu->children) > 0)
                <li>
                    <div class="dropdown">
                        <a class="scroll-link" href="#{{ $menu->href }}">{{ $menu->title_eng }}
                            <span class="material-symbols-outlined arrow">▾</span>
                        </a>
                        <div class="dropdown-content">
                            @foreach ($menu->children as $child)
                                <a href="/{{ $child->href }}">▸ {{ $child->title_eng }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
            @else
                @if (!$menu->is_child)
                    <li><a href="/#{{ $menu->href }}">{{ $menu->title_eng }}</a></li>
                @endif
            @endif
        @endforeach
    </ul>
</nav>
