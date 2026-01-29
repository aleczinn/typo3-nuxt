// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
    compatibilityDate: '2026-01-29',

    devtools: { enabled: true },
    ssr: true,

    modules: ['@t3headless/nuxt-typo3'],

    typo3: {
        api: {
            baseUrl: 'http://192.168.178.15:5123'
        }
    },

    runtimeConfig: {
        public: {
            siteUrl: 'http://localhost:3000',
            siteName: 'Babiel',
            typo3BaseUrl: 'http://192.168.178.15:5123'
        }
    },

    css: ['~/assets/css/main.css'],

    vite: {
        plugins: [
            tailwindcss()
        ]
    },

    // SEO & Meta
    app: {
        head: {
            charset: 'utf-8',
            viewport: 'width=device-width, initial-scale=1',
            htmlAttrs: {
                lang: 'de'
            }
        }
    },

    // Performance
    experimental: {
        payloadExtraction: false
    },

    // Nitro (Server)
    nitro: {
        compressPublicAssets: true
    }
})
