<script lang="ts" setup>
import type { T3CeBulletsProps } from '@t3headless/nuxt-typo3';

const props = defineProps<T3CeBulletsProps>();
const { listTag, showBaseList } = useT3CeBullets(props);
</script>
