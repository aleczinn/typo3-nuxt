<template>
    <NuxtLayout>
        <div class="min-h-screen flex items-center justify-center px-4">
            <div class="max-w-md w-full text-center">
                <!-- Status Code -->
                <h1 class="text-9xl font-bold text-primary mb-4">
                    {{ error.statusCode }}
                </h1>

                <!-- Error Message -->
                <h2 class="text-2xl font-semibold mb-4">
                    {{ errorTitle }}
                </h2>

                <p class="text-gray-600 mb-8">
                    {{ errorMessage }}
                </p>

                <!-- Actions -->
                <div class="flex gap-4 justify-center">
                    <UiButton @click="handleError">
                        Zur Startseite
                    </UiButton>

                    <UiButton variant="secondary" @click="reloadPage">
                        Seite neu laden
                    </UiButton>
                </div>
            </div>
        </div>
    </NuxtLayout>
</template>

<script setup lang="ts">
interface Props {
    error: {
        statusCode: number
        statusMessage?: string
        message?: string
    }
}

const props = defineProps<Props>()

const errorTitle = computed(() => {
    const titles: Record<number, string> = {
        404: 'Seite nicht gefunden',
        500: 'Serverfehler',
        403: 'Zugriff verweigert',
        401: 'Nicht autorisiert'
    }
    return titles[props.error.statusCode] || 'Ein Fehler ist aufgetreten'
})

const errorMessage = computed(() => {
    if (props.error.statusCode === 404) {
        return 'Die angeforderte Seite konnte nicht gefunden werden.'
    }
    return props.error.message || props.error.statusMessage || 'Bitte versuchen Sie es später erneut.'
})

const handleError = () => clearError({ redirect: '/' })
const reloadPage = () => window.location.reload()
</script>