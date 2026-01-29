<template>
    <NuxtLayout>
        <NuxtPage/>
    </NuxtLayout>
</template>

<script setup lang="ts">
const { initialData } = useT3Api()
const config = useRuntimeConfig()
const route = useRoute()

const pageTitle = computed(() => {
    return initialData.value?.seo?.title || initialData.value?.meta?.title || config.public.siteName
})

const pageDescription = computed(() => {
    return initialData.value?.meta?.description || ''
})

const ogImage = computed(() => {
    const image = initialData.value?.meta?.ogImage
    if (!image) {
        return null
    }

    if (image.startsWith('/')) {
        return `${config.public.typo3.api.baseUrl}${image}`
    }
    return image
})

const canonicalUrl = computed(() => {
    const canonical = initialData.value?.meta?.canonical
    if (canonical) {
        return canonical
    }
    return `${config.public.siteUrl}${route.path}`
})

const robotsContent = computed(() => {
    const robots = initialData.value?.meta?.robots
    if (!robots) {
        return 'index,follow'
    }

    const parts = []
    if (robots.noIndex) parts.push('noindex')
    else parts.push('index')

    if (robots.noFollow) {
        parts.push('nofollow')
    } else {
        parts.push('follow')
    }
    return parts.join(',')
})

useHead({
    title: pageTitle,
    meta: [
        {
            name: 'description',
            content: pageDescription
        },
        {
            property: 'og:title',
            content: () => initialData.value?.meta?.ogTitle || pageTitle.value
        },
        {
            property: 'og:description',
            content: () => initialData.value?.meta?.ogDescription || pageDescription.value
        },
        {
            property: 'og:image',
            content: ogImage
        },
        {
            property: 'og:type',
            content: 'website'
        },
        {
            property: 'og:url',
            content: canonicalUrl
        },
        {
            name: 'twitter:card',
            content: () => initialData.value?.meta?.twitterCard || 'summary_large_image'
        },
        {
            name: 'twitter:title',
            content: () => initialData.value?.meta?.twitterTitle || pageTitle.value
        },
        {
            name: 'twitter:description',
            content: () => initialData.value?.meta?.twitterDescription || pageDescription.value
        },
        {
            name: 'twitter:image',
            content: () => initialData.value?.meta?.twitterImage || ogImage.value
        },
        {
            name: 'robots',
            content: robotsContent
        }
    ],
    link: [
        {
            rel: 'canonical',
            href: canonicalUrl
        }
    ],
    htmlAttrs: {
        lang: 'de'
    }
})
</script>
