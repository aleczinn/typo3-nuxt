<template>
  <header v-if="navigation">
    <NuxtLink v-for="{ link, title } in navigation" :key="link" :to="link">
      {{ title }}
    </NuxtLink>
  </header>
  <NuxtPage />
</template>
<script setup lang="ts">
const { initialData } = useT3Api()
const navigation = computed(
  () => initialData.value?.navigation?.[0]?.children ?? []
)
</script>
<style scoped>
header a {
  display: inline-block;
  margin-right: 10px;
}
</style>
