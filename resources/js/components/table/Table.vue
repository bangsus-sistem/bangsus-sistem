<template>
    <table
        :class="{
            'table': true,
            'table-bordered': bordered,
            'table-hover': hover,
            'table-striped': striped,
            'table-borderless': borderless
        }"
    >
        <slot></slot>
    </table>
</template>

<script>
export default {
    props: {
        bordered: {
            type: Boolean,
            default: false,
        },
        hover: {
            type: Boolean,
            default: false,
        },
        striped: {
            type: Boolean,
            default: false,
        },
        borderless: {
            type: Boolean,
            default: false,
        },
        sm: {
            type: Boolean,
            default: false,
        }
    },
    computed: {

    }
}
</script>