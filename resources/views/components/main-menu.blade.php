<ul>
    @foreach($children as $k => $i)
        <li class="app-main-menu__item {{ isset($i['children']) || isset($i['url']) ? 'app-main-menu__parent' : '' }}"
            id="app-main-menu__id-{{ $i['id'] ?? ($level . '_' . $k + 1) }}">
            @if(isset($i['title']) || isset($i['icon']))
                @if (!empty($i['to']))
                    <a href="{{ $i['to']['target'] ?? $i['to'] }}" @isset($i['url']) data-url="{{ $i['url']  }}" @endisset>
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

@pushonce('styles')
    <style>
        .app-main-menu {
            flex-grow: 0;
            position: relative;
            z-index: 30;
            padding: 0;
            background-color: var(--bs-gray-900);
            color: var(--bs-light);
            cursor: default;
        }
        .app-main-menu ul, .app-main-menu li {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .app-main-menu > ul {
            display: flex;
            justify-content: space-between;
        }
        .app-main-menu > ul > li > ul {
            display: flex;
        }
        .app-main-menu > ul > li > ul li {
            position: relative;
        }
        .app-main-menu > ul > li > ul > li > ul > li {
            position: static;
        }
        .app-main-menu > ul > li > ul > li ul {
            display: none;
            position: absolute;
            flex-direction: column;
            left: 0;
            top: 100%;
            padding: 0.25rem 0;
            min-width: 18rem;
            background-color: var(--bs-gray-800);
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
        .app-main-menu > ul > li > ul > li li > ul {
            top: 0;
            left: 100%
        }
        .app-main-menu > ul > li:last-of-type > ul > li ul {
            left: auto;
            right: 0;
        }
        .app-main-menu > ul > li > ul li:hover > ul {
            display: flex;
        }
        .app-main-menu li > a, .app-main-menu li > span {
            display: flex;
            align-items: center;
            padding: .5rem 1rem;
            height: 100%;
            white-space: nowrap;
            text-decoration: none;
            color: var(--bs-light);
        }
        .app-main-menu li > a span, .app-main-menu li > span span {
            flex-grow: 1;
        }
        .app-main-menu > ul > li > ul > li > a, .app-main-menu > ul > li > ul > li > span {
            border-radius: 0;
        }
        .app-main-menu li:hover > a, .app-main-menu li:hover > span {
            background-color: var(--bs-gray-800);
            color: white;
        }
        .app-main-menu > ul > li > ul > li li:hover > a, .app-main-menu > ul > li > ul > li li:hover > span {
            background-color: var(--bs-blue);
        }
        .app-main-menu span > span {
            display: inline-block;
            padding: 0;
        }
        .app-main-menu i {
            width: 1.25rem;
            text-align: center;
            flex-grow: 0;
        }
        .app-main-menu i ~ span {
            padding-left: 0.5rem;
        }
        .app-main-menu i.toggle {
            margin-left: 0.25rem;
            font-size: 0.75rem;
            line-height: 0;
            opacity: 60%;
        }
        .app-main-menu > ul > li > ul > li li i.toggle {
            transform: rotate(-90deg);
        }
        .app-main-menu .app-main-menu__manager > span {
            flex-direction: row-reverse;
        }
        .app-main-menu .app-main-menu__manager > span i ~ span {
            padding-left: 0;
            padding-right: 0.5rem;
        }
        .app-main-menu .app-main-menu__manager i.toggle {
            order: -1
        }
        @media (max-width: 992px) {
            .app-main-menu > ul > li > ul li {
                position: static;
            }
            .app-main-menu > ul > li > ul > li ul {
                width: 100%;
            }
            .app-main-menu > ul > li > ul > li > span > span {
                display: none;
            }
            .app-main-menu li > a, .app-main-menu li > span {
                padding: 0.5rem;
            }
        }
    </style>
@endpushonce
