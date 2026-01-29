<template>
    <nav v-if="navigation">
        <NuxtLink v-for="{ link, title } in navigation" :key="link" :to="link">
            {{ title }}
        </NuxtLink>
    </nav>
</template>

<script setup lang="ts">
const { initialData } = useT3Api();
const navigation = computed(() => initialData.value?.navigation?.[0]?.children ?? []);
</script>