<template>
    <option v-if="item['active']">
        <slot />
    </option>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default() {
                return {
                    active: true
                }
            },
        },
    }
}
</script>