<template>
    <div class="flex flex-col h-screen">
        <LayoutHeader/>

        <main class="flex-1">
            <slot/>
        </main>

        <LayoutFooter/>
    </div>
</template>

<script setup lang="ts">

</script>
