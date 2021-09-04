<template>
    <div>
        <Col class="text-center" v-if="loading">
            <Spinner />
        </Col>
        <slot v-else></slot>
    </div>
</template>

<script>
import Col from '../utils/Col'
import Spinner from '../spinner/Spinner'

export default {
    components: {
        Col,
        Spinner,
    },
    props: {
        loading: {
            type: Boolean,
            default: false,
        },
    }
}
</script>