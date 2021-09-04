<template>
    <div>
        <div class="sidebar-backdrop" @click="clickBackdrop"></div>
        <div class="sidebar-mobile bg-gray-700">
            <slot/>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        clickBackdrop(e) {
            this.$emit('clickBackdrop', e)
        }
    }
}
</script>