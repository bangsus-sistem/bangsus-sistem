<template>
    <span>
        <Icon :icon="trueIcon" :color="singleColor ? color : successColor" v-if="value" />
        <Icon :icon="falseIcon" :color="singleColor ? color : dangerColor" v-else />
    </span>
</template>

<script>
import Icon from './Icon'

export default {
    components: {
        Icon,
    },
    props: {
        value: {
            type: Boolean,
            default: true,
        },
        trueIcon: {
            type: String,
            default: 'check',
        },
        falseIcon: {
            type: String,
            default: 'times',
        },
        singleColor: {
            type: Boolean,
            default: false,
        },
        color: {
            type: String,
            default: 'dark',
        },
        successColor: {
            type: String,
            default: 'success',
        },
        dangerColor: {
            type: String,
            default: 'danger',
        },
    }
}
</script>