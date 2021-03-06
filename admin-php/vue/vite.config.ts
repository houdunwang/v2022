import { ConfigEnv, defineConfig, loadEnv } from 'vite'
import alias from './vite/alias'
import { parseEnv } from './vite/util'
import setupPlugins from './vite/plugins'
import { visualizer } from 'rollup-plugin-visualizer'
import vue from '@vitejs/plugin-vue'

export default defineConfig(({ command, mode }) => {
  const isBuild = command == 'build'
  const env = parseEnv(loadEnv(mode, process.cwd()))

  return {
    plugins: [
      vue({
        reactivityTransform: true,
      }),
      ...setupPlugins(isBuild, env),
      visualizer(),
    ],
    base: isBuild ? '/system/' : '/',
    resolve: {
      alias,
    },
    build: {
      rollupOptions: {
        emptyOutDir: true,
        output: {
          manualChunks(id: string) {
            if (id.includes('node_modules')) {
              return id.split('/node_modules/').pop()?.split('/')[0]
            }
          },
        },
      },
    },
    server: {
      //   open: true,
      port: 3001,
      proxy: {
        '/api': {
          target: env.VITE_MOCK_ENABLE ? '/' : env.VITE_API_URL,
          changeOrigin: true,
          // rewrite: (path: string) => path.replace(/^\/api/, ''),
        },
        '/captcha/api/math': {
          target: env.VITE_MOCK_ENABLE ? '/' : env.VITE_API_URL,
          changeOrigin: true,
        },
      },
    },
  }
})
