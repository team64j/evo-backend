<script setup>
import { h } from 'vue'
import { RouterLink } from 'vue-router'

const props = defineProps({
  data: Array
})

const emit = defineEmits(['action'])

function action () {
  if (typeof arguments[0] === 'function') {
    arguments[0](...Array.from(arguments).splice(1))
  } else {
    emit('action', ...arguments)
  }
}

function item (i) {
  if (!(i.title || i.icon)) {
    return
  }

  let el
  const slots = []

  if (i.icon) {
    slots.push(h('i', { class: i.icon }))
  }

  if (i.title) {
    slots.push(h('span', { innerHTML: i.title }))
  }

  if (i.children || i.url) {
    slots.push(
        h('i', {
          class: 'fa fa-angle-down toggle',
          onClick (event) {
            emit('action', 'onToggleClick', event, i)
          }
        })
    )
  }

  if (i?.to?.href) {
    el = h('a', i.to, slots)
  } else if (i.to) {
    el = h(RouterLink, { to: i.to }, () => slots)
  } else {
    el = h('span', slots)
  }

  return el
}
</script>

<template>
  <li v-for="i in data" :class="{ 'app-main-menu__parent': i.children || i.url }"
      @click="emit('action', 'onClick', $event, i)"
      @mouseenter="emit('action', 'onEnter', $event, i)"
      @mouseout="emit('action', 'onOut', $event, i)">

    <component v-bind="i" :is="item"/>

    <ul v-if="i.children">
      <main-menu-item :data="i.children" @action="action"/>
    </ul>
  </li>
</template>
