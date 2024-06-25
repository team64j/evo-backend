import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  base: './',
  plugins: [
    vue(),
    laravel({
      input: [
        'resources/js/app.js'
      ],
      refresh: true
    })
  ],
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
    },
    extensions: ['.js', '.vue', '.json']
  }
})
