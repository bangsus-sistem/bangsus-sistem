<template>
    <span class="input-group-text">
        {{ label }}
    </span>
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