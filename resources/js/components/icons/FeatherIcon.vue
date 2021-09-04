<template>
    <span v-html="iconSvg" :class="className"></span>
</template>

<script>
export default {
    props: {
        icon: {
            required: true,
            type: String
        },
        color: {
            type: String,
            default: '',
        },
        size: {
            type: Number,
            default: 24,
        }
    },
    computed: {
        iconSvg() {
            return feather.icons[this.icon].toSvg({
                width: this.size,
                height: this.size,
            })
        },
        className() {
            return 'text-' + this.color + ' d-flex align-items-center'
        }
    }
}
</script>