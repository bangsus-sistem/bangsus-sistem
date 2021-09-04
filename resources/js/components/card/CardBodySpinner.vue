<template>
    <CardBody>
        <Col class="text-center" v-if="loading">
            <Spinner />
        </Col>
        <slot v-else></slot>
    </CardBody>
</template>

<script>
import CardBody from './CardBody'
import Col from '../utils/Col'
import Spinner from '../spinner/Spinner'

export default {
    components: {
        CardBody,
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