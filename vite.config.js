import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  base: './',
  build: {
    //   //outDir: '../../../manager',
    target: 'esnext',
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          let extType = assetInfo.name.split('.').at(1),
            ext = assetInfo.name.split('.').pop()

          if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(ext)) {
            extType = 'img'
          } else if (/ttf|woff2/i.test(ext)) {
            extType = 'fonts'
          }

          return `assets/${extType}/[hash][extname]`
        },
        chunkFileNames: 'assets/js/[hash].js',
        entryFileNames: 'assets/js/[hash].js'
      }
    }
  },
  plugins: [
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    }),
    laravel({
      input: [
        'resources/js/app.js',
        'resources/js/app-page.js',
        'resources/js/app-auth.js',
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
