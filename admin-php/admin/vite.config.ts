import { ConfigEnv, loadEnv } from 'vite'
import alias from './vite/alias'
import { parseEnv } from './vite/util'
import setupPlugins from './vite/plugins'
import { visualizer } from 'rollup-plugin-visualizer'

export default ({ command, mode }: ConfigEnv) => {
    const isBuild = command == 'build'
    const root = process.cwd()
    const env = parseEnv(loadEnv(mode, root))

    return {
        plugins: [...setupPlugins(isBuild, env), visualizer()],
        resolve: {
            alias,
        },
        build: {
            rollupOptions: {
                emptyOutDir: true,
                output: {
                    manualChunks(id: string) {
                        if (id.includes('node_modules')) {
                            return id.toString().split('node_modules/')[1].split('/')[0].toString()
                        }
                    },
                },
            },
        },
        //开发环境设置
        server: {
            proxy: {
                // '/sanctum': {
                //     //将/api访问转换为target
                //     target: 'http://houdunren.test/sanctum',
                //     changeOrigin: true,
                //     rewrite: path => path.replace(/^\/sanctum/, ''),
                // },
                '/api': {
                    //将/api访问转换为target
                    target: 'http://admin-php.test/api',
                    //跨域请求携带cookie
                    changeOrigin: true,
                    //url 重写删除`/api`
                    rewrite: (path: string) => path.replace(/^\/api/, ''),
                },
            },
        },
    }
}
