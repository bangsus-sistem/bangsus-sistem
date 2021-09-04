<template>
    <Badge color="success" v-if="condition">{{ trueLabel }}</Badge>
    <Badge color="danger" v-else>{{ falseLabel }}</Badge>
</template>

<script>
import Badge from './Badge'

export default {
    components: {
        Badge
    },
    props: {
        condition: {
            required: true,
        },
        trueLabel: {
            type: String,
            default: 'true'
        },
        falseLabel: {
            type: String,
            default: 'false'
        }
    }
}
</script>