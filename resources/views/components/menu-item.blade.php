<li class="menu-item">
    <a href="{{ $link }}" class="menu-item-link {{ $css }}
    {{ \Illuminate\Support\Facades\Request::url() == $link ? 'active' : '' }}">
                <span><i class="{{ $class }} fa-fw"></i>
                  {{ $menu }}</span>
        @if($counter>=0)
            <span class="badge rounded-1 bg-white text-primary opacity-75 shadow-sm">{{ $counter }}</span>
            @endif
    </a>
</li>
