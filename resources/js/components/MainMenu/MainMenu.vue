<script>
export default {
  name: 'MainMenu',
  props: {
    data: Array
  },
  methods: {
    getId (id) {
      return id || crypto.getRandomValues(new Uint32Array(1))[0].toString(36)
    }
  }
}
</script>

<template>
  <ul>
    <li v-for="i in data" :class="'app-main-menu__' + getId(i.id)">
      <template v-if="i.title || i.icon">
        <a v-if="i.to" v-bind="typeof i.to === 'string' ? { href: i.to } : i.to">
          <i v-if="i.icon" :class="i.icon"/>
          <span v-if="i.title" v-html="i.title"/>
          <i v-if="i.children || i.url" class="fa fa-angle-down toggle"/>
        </a>
        <span v-else>
          <i v-if="i.icon" :class="i.icon"/>
          <span v-if="i.title" v-html="i.title"/>
          <i v-if="i.children || i.url" class="fa fa-angle-down toggle"/>
        </span>
      </template>

      <MainMenu v-if="i.children" :data="i.children"/>
    </li>
  </ul>
</template>

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
.app-main-menu > ul > li:last-of-type > ul > li ul {
  left: auto;
  right: 0;
}
.app-main-menu > ul > li > ul > li:hover ul {
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
