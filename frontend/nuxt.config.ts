// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
    devtools: { enabled: true },
    ssr: true,
    modules: ['@t3headless/nuxt-typo3'],
    typo3: {
        api: {
            baseUrl: 'http://192.168.178.15:5123'
        }
    },
    
    css: ['~/assets/css/main.css'],

    vite: {
        plugins: [
            tailwindcss()
        ]
    }
})
