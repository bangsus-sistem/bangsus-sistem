<template>
    <label class="form-check-label">
        {{ label }}
        <slot></slot>
    </label>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: '',
        }
    }
}
</script>