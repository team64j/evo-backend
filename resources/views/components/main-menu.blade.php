<ul>
    @foreach($children as $k => $i)
        <li class="app-main-menu__item {{ isset($i['children']) || isset($i['url']) ? 'app-main-menu__parent' : '' }}"
            id="app-main-menu__id-{{ $i['id'] ?? ($level . '_' . $k + 1) }}">
            @if(isset($i['title']) || isset($i['icon']))
                @if (!empty($i['to']))
                    <a href="{{ $i['to']['target'] ?? $i['to'] }}" @isset($i['url']) data-url="{{ $i['url']  }}" @endisset target="main">
                        @isset($i['icon'])
                            <i class="{{ $i['icon'] }}"></i>
                        @endisset
                        @isset($i['title'])
                            <span>
                                {!! $i['title'] !!}
                            </span>
                        @endisset
                        @if(isset($i['children']) || isset($i['url']))
                            <i class="fa fa-angle-down toggle"></i>
                        @endif
                    </a>
                @else
                    <span>
                        @isset($i['icon'])
                            <i class="{{ $i['icon'] }}"></i>
                        @endisset
                        @isset($i['title'])
                            <span>
                                {!! $i['title'] !!}
                            </span>
                        @endisset
                        @if(isset($i['children']) || isset($i['url']))
                            <i class="fa fa-angle-down toggle"></i>
                        @endif
                    </span>
                @endif
            @endif

            @if(!empty($i['children']))
                <x-main-menu :children="$i['children']" :level="$level + 1"></x-main-menu>
            @endif
        </li>
    @endforeach
</ul>

@pushonce('scripts')
    <script>
      document.querySelectorAll('.app-main-menu__parent > a').forEach(i => {
        i.addEventListener('mouseenter', event => {
          if (!event.target.dataset.url) {
            return
          }

          let children = event.target.querySelector(':scope > ul')

          if (!children) {
            axios.get(event.target.dataset.url).then(j => {
              if (j.data) {
                const template = document.createElement('div')
                template.innerHTML = j.data
                event.target.parentNode.append(...template.childNodes)
              }
            })
          }
        })
      })
    </script>
@endpushonce
