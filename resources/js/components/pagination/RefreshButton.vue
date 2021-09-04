<template>
    <span>
        <Spinner size="sm" v-if="loading" />
        <a href="#" class="text-dark" @click.prevent="$emit('click')" v-else>
            <i class="fas fa-sync"></i>
        </a>
    </span>
</template>

<script>
import Spinner from '../spinner/Spinner'

export default {
    components: {
        Spinner,
    },
    props: {
        loading: {
            type: Boolean,
            default: false,
        }
    }
}
</script>