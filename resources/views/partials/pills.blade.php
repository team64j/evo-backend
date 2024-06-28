<ul class="nav nav-pills mb-3 flex-grow-0 d-flex flex-nowrap px-3 overflow-auto">
    @foreach($data as $item)
        <li class="nav-item">
            <a href="{{ $item['to'] }}"
               class="nav-link py-1 text-nowrap {{ $active == $item['id'] ? 'active' : '' }}">
                {{ $item['title'] }}
            </a>
        </li>
    @endforeach
</ul>
