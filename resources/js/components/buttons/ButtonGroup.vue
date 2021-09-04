<template>
    <div :class="{ 'btn-group': true, 'btn-group-sm': sm }">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        sm: {
            type: Boolean,
            default: false
        }
    }
}
</script>