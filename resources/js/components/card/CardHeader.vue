<template>
    <div class="card-header">
        <slot></slot>
        <template v-if="title">
            {{ title }}
        </template>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            default: null
        }
    }
}
</script>