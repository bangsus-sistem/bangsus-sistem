<template>
    <span class="sidebar-item-title">
        {{ title }}
    </span>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true,
        }
    }
}
</script>