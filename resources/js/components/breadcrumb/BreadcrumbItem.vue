<template>
    <li :class="{ 'breadcrumb-item': true, 'active': active }">
        <slot/>
    </li>
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