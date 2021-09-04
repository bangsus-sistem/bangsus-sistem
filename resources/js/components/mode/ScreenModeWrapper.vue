<template>
    <div class="screen-mode-wrapper">
        {{ label }}
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            required: true,
        }
    }
}
</script>