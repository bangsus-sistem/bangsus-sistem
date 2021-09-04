<template>
    <div
        :class="{
            'sidebar-item': true,
            'active': active
        }"
    >
        <slot/>
    </div>
</template>

<script>
export default {
    props: {
        active: {
            type: Boolean,
            default: false,
        }
    }
}
</script>