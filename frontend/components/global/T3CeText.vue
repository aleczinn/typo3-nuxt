<template>
    <div class="t3-ce-text">
        <h2>{{ header }}</h2>
        <p>{{ bodytext }}</p>
    </div>
</template>

<script lang="ts" setup>
import type { T3CeTextProps } from '@t3headless/nuxt-typo3';

const props = defineProps<T3CeTextProps>();
// Implement or extend JavaScript logic here
</script>

<style>
p {
    color: blue;
}
</style>
