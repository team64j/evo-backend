<div id="app-global-tabs" class="app-global-tabs d-flex flex-column flex-grow-1">
    <div class="app-global-tabs__tabs flex-grow-0">
        @foreach($tabs as $k => $tab)
            <button class="btn btn-sm {{ $tab['active'] ? 'btn-primary' : 'btn-dark' }}"
                    onmousedown="AppGlobalTabs.clickTab({{ $k}})"
                    ondblclick="AppGlobalTabs.dblClickTab({{ $k }})"
                    type="button"
                    data-key="{{ $tab['path'] }}">

                @if(!empty($tab['meta']['icon']))
                    <span class="app-global-tabs__icon">
                    <i class="{{ $tab['meta']['icon'] }}"></i>
                  </span>
                @endif

                @if(!empty($tab['meta']['title']))
                    <span class="app-global-tabs__title">{{ $tab['meta']['title'] }}</span>
                @endif

                @if(!empty($tab['meta']['fixed']))
                    <span class="app-global-tabs__close" @mousedown.stop="closeTab({{ $k }})">✕</span>
                @endif
            </button>
        @endforeach
    </div>

    <div class="app-global-tabs__frames flex-grow-1">
        @foreach($tabs as $tab)
            <iframe src=".{{ $tab['path'] }}" class="{{ $active == $tab['path'] ? '' : 'd-none' }}"></iframe>
        @endforeach
    </div>
</div>

{{--@pushonce('scripts')
    <script>
      var AppGlobalTabs = Vue.createApp({
        data () {
          return {
            tabs: @json($tabs)
          }
        },
        created () {
          Vue.watch(
            AppRouter.currentRoute,
            route => {
              this.addTab(route)
            }
          )
        },
        mounted () {
          this.init()
        },
        methods: {
          init () {
            AppRouter.getRoutes().filter(i => i?.meta?.fixed).map(i => this.addTab(AppRouter.parse(i)))
            this.addTab(AppRouter.currentRoute.value)
          },
          addTab (data) {
            if (!data) {
              return
            }

            data = AppRouter.parse(data)

            let is = false

            this.tabs.map(i => {
              i.active = AppRouter.key(i, data)

              if (i.active) {
                is = true
                data.meta = i.meta
                Object.assign(i, data)
              }
            })

            if (!is && !data.meta['hidden']) {
              data.active = true
              this.tabs.push(data)
            }

            this.keys = this.tabs.map(i => AppRouter.key(i))

            const tabsEl = document.querySelector('.app-global-tabs__tabs')
            const framesEl = document.querySelector('.app-global-tabs__frames')

            this.tabs.forEach((i, k) => {
              const path = i.path
              const key = AppRouter.key(i)
              let tab = tabsEl.querySelector('[data-key="' + key + '"]')
              let page = framesEl.childNodes[k]

              if (!tab) {
                tab = document.createElement('button')
                tab.setAttribute('data-key', key)
                tab.type = 'button'
                tab.className = 'btn btn-sm'
                tab.innerText = path
                tab.onclick = () => this.clickTab(k)
                tab.ondblclick = () => this.dblClickTab(k)
                tabsEl.append(tab)

                page = document.createElement('iframe')
                page.src = '.' + path
                framesEl.append(page)
              }

              if (i.active) {
                tab.classList.add('btn-primary')
                tab.classList.remove('btn-dark')
                page.classList.remove('d-none')
              } else {
                tab.classList.remove('btn-primary')
                tab.classList.add('btn-dark')
                page.classList.add('d-none')
              }
            })
          },
          setTab (data) {
            this.$store.dispatch('set', { tabsLoading: data.loading })

            if (data.key) {
              const index = this.keys.indexOf(data.key)
              index > -1 && window._.mergeWith(this.tabs[index], data)
            } else {
              this.tabs.map(i => i.active && window._.mergeWith(i, data))
            }
          },
          closeTab (callback) {
            let route = typeof callback === 'object' ? callback : AppRouter.currentRoute.value
            const index = this.keys.indexOf(AppRouter.key(route))
            const tab = this.tabs[index]

            if (tab?.changed && !confirm(this.$store.getters.get('lang.warning_not_saved'))) {
              return
            }

            if (tab?.meta['fixed']) {
              return
            }

            index > -1 && this.tabs.splice(index, 1) && this.keys.splice(index, 1)

            if (tab.active && index > 0 && this.tabs[index - 1]) {
              AppRouter.to(this.tabs[index - 1])
            }

            if (typeof callback === 'function') {
              callback()
            }

            return index
          },
          toTab (data) {
            const tab = this.find(AppRouter.currentRoute.value)
            if (tab?.changed && !confirm(this.$store.getters.get('lang.warning_not_saved'))) {
              return
            }
            this.closeTab(AppRouter.currentRoute.value)
            AppRouter.to(data)
          },
          clickTab (index) {
            AppRouter.to(this.tabs[index])
          },
          dblClickTab (index) {
            const data = this.tabs[index]
            if (AppRouter.key(AppRouter.currentRoute.value, data)) {
              // ...
            }

            // AppRouter.key(AppRouter.currentRoute.value, data) &&
            // AppRouter.replace(AppRouter.parse({ path: '/redirect' + data.path, query: data.query })).then(() => {
            //   const index = this.keys.indexOf(AppRouter.key(data))
            //   index > -1 && this.keys.splice(index, 1)
            // })
          },
          find (data) {
            return this.tabs.filter(i => AppRouter.key(i, data))[0] || null
          }
        }
      }).mount('#app-global-tabs')
    </script>
@endpushonce--}}

{{--@pushonce('styles')
    <style>
        .app-global-tabs {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .app-global-tabs__tabs {
            flex-grow: 0;
            overflow: auto;
            display: flex;
            flex-wrap: nowrap;
            background-color: var(--bs-gray-900);
        }
        .app-global-tabs__tabs button {
            height: 1.75rem;
            padding: 0.125rem 0.75rem;
            border-radius: 0;
            white-space: nowrap;
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
        }
        .app-global-tabs__icon {
            width: 1rem;
        }
        .app-global-tabs__icon i {
            color: white !important;
            font-size: 1rem !important;
        }
        .app-global-tabs__icon .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: 2px
        }
        .app-global-tabs__title {
            width: 7rem;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .app-global-tabs__tabs button .app-global-tabs__icon ~ .app-global-tabs__title {
            margin-left: 0.5rem;
        }
        .app-global-tabs__close {
            margin: -0.125rem -0.75rem -0.125rem 0.5rem;
            padding: 0.125rem 0.5rem;
            opacity: 60%;
        }
        .app-global-tabs__close:hover {
            color: var(--bs-red);
            opacity: 100%;
        }
        .app-global-tabs__frames {
            flex-grow: 1;
            overflow: hidden;
        }
        .app-global-tabs__frames iframe {
            width: 100%;
            height: 100%;
            border: none;
            overflow: auto;
        }
    </style>
@endpushonce--}}
