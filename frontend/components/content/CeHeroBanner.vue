<template>
    <section class="relative h-screen w-full overflow-hidden">
        <!-- Background Image -->
        <div v-if="imageUrl" class="absolute inset-0">
            <img
                :src="imageUrl"
                :alt="imageAlt"
                class="h-full w-full object-cover"
                loading="eager"
            />
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60" />
        </div>

        <!-- Fallback -->
        <div
            v-else
            class="absolute inset-0 bg-gradient-to-br from-primary to-primary-darker"
        />

        <!-- Content -->
        <div class="relative z-10 flex h-full items-center justify-center px-4">
            <div class="max-w-4xl text-center text-white">
                <h1
                    v-if="content.header"
                    class="mb-6 text-5xl font-bold leading-tight md:text-7xl"
                >
                    {{ content.header }}
                </h1>

                <p
                    v-if="content.subheader"
                    class="mb-8 text-xl font-light md:text-2xl"
                >
                    {{ content.subheader }}
                </p>

                <div
                    v-if="content.bodytext"
                    v-html="content.bodytext"
                    class="prose prose-lg prose-invert mx-auto max-w-2xl"
                />
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
interface Props {
    id: number
    type: string
    content: {
        header?: string
        subheader?: string
        bodytext?: string
        media?: Array<{
            publicUrl: string
            properties: {
                alternative?: string
                title?: string
            }
        }>
    }
}

const props = defineProps<Props>()
const config = useRuntimeConfig()

const imageUrl = computed(() => {
    const media = props.content.media?.[0]
    if (!media?.publicUrl) return null

    // Absoluter URL wenn schon vollständig, sonst Base URL hinzufügen
    if (media.publicUrl.startsWith('http')) return media.publicUrl
    return `${config.public.typo3.api.baseUrl}${media.publicUrl}`
})

const imageAlt = computed(() =>
    props.content.media?.[0]?.properties?.alternative || props.content.header || 'Hero Banner'
)
</script>