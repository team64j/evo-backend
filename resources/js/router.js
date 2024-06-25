import { createRouter, createWebHashHistory } from 'vue-router'
import { h } from 'vue'

const routes = [
  {
    path: '/',
    redirect: '/dashboard',
    meta: {
      hidden: true,
    }
  },
  {
    path: '/dashboard',
    component: h('div'),
    meta: {
      fixed: true,
      icon: 'fa fa-home',
      title: null
    }
  },
  {
    path: '/:path(.*)',
    component: h('div'),
  },
  {
    path: '/:path(.*)/:id(\d+)',
    component: h('div'),
  },
  // {
  //   path: '/:path(.*)/:element',
  //   component: h('div'),
  // },
  {
    path: '/elements/:element',
    component: h('div'),
    meta: {
      group: true
    }
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

/**
 * @param route
 * @param compareRoute
 * @returns {string|boolean}
 */
router.key = (route, compareRoute = null) => {
  let queryKey

  if (compareRoute) {
    queryKey = true

    if (route?.meta['queryKey'] && compareRoute?.meta['queryKey'] && route?.query['id'] !== undefined &&
      compareRoute?.query['id'] !== undefined) {
      queryKey = route.query['id'] === compareRoute.query['id']
    }

    return (route?.meta?.group ?
      ((route.name && route.name === compareRoute.name) || route.matched[0]?.path === compareRoute.matched[0]?.path) :
      route.path === compareRoute.path) && queryKey
  } else {
    queryKey = ''

    if (route?.meta['queryKey'] && route?.query['id'] !== undefined) {
      queryKey = '/' + route.query['id']
    }

    return (route?.meta?.group ? (route.name/* || route.matched[0]?.path*/ || route.path) : route.path) + queryKey
  }
}

/**
 * @param route - Raw route location to resolve
 * @see router.resolve()
 */
router.parse = (route) => {
  if (route.path && route.params) {
    const query = route.path.split('?')[1] ?? null

    if (query) {
      if (!route.query) {
        route.query = {}
      }

      for (const i of query.split('&')) {
        const q = i.split('=')
        route.query[q[0]] = q[1]
      }
    }

    Object.entries(route.params).forEach(([k, v]) => {
      if (!(v === undefined || v === null)) {
        const re = new RegExp(':' + k, 'g')
        v = v.toString()

        if (/:/.test(route?.path)) {
          route.path = route.path.replace(re, v).
            replace(/\/\//g, '/').
            replace(/\/$/, '')
        }

        if (route?.query?.[k]) {
          route.query[k] = route.query[k].replace(re, v)
        }
      }
    })
  }

  return router.resolve(route)
}

/**
 * @param route - Raw route location to push
 * @see router.push()
 */
router.to = (route) => router.push(router.parse(route))

export default router
