<template>
    <Button type="submit" :disabled="loading" :size="size" @click="$emit('click', $event)" :block="block">
        <Spinner size="sm" v-if="loading" />
        <slot></slot>
    </Button>
</template>

<script>
import Button from './Button'
import Spinner from '../spinner/Spinner'

export default {
    components: {
        Button,
        Spinner,
    },
    props: {
        loading: {
            type: Boolean,
            default: true,
        },
        size: {
            type: String,
            default: 'md',
        },
        block: {
            type: Boolean,
            default: false,
        }
    },
}
</script>