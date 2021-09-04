<template>
    <Th :justify="justify">
        <a href="#" class="text-dark" v-if="!disabled" @click.prevent="$emit('click', $event)">
            <slot></slot>
        </a>
        <span v-else>
            <slot></slot>
        </span>

        <span v-if="sort">
            <i class="fas fa-xs fa-caret-down" v-if="order == 'asc'"></i>
            <i class="fas fa-xs fa-caret-up" v-else-if="order == 'desc'"></i>
        </span>
    </Th>
</template>

<script>
import Th from './Th'

export default {
    components: {
        Th,
    },
    props: {
        sort: {
            type: Boolean,
            default: false,
        },
        order: {
            type: String,
            default: 'asc',
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        justify: {
            type: String,
            default: 'center',
        }
    }
}
</script>