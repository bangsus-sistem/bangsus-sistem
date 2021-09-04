<template>
    <div
        :class="{
            'sidebar-collapse-item': true,
            'active': active,
        }"
    >
        <slot/>
    </div>
</template>

<script>
export default {
    props: {
        active: {
            required: true,
        },
    },
}
</script>