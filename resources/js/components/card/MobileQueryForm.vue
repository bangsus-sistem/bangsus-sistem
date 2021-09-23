<template>
    <div>
        <Col class="text-center">
            <a href="#" @click.prevent="toggleShow">
                Cari Sesuatu <Icon :icon="icon" color="primary" />
            </a>
        </Col>
        <Card class="mt-1" v-if="show">
            <CardBody>
                <slot />
            </CardBody>
        </Card>
    </div>
</template>

<script>
import Card from './Card'
import CardBody from './CardBody'
import Icon from '../icons/Icon'
import Col from '../utils/Col'

export default {
    components: {
        Card,
        CardBody,
        Icon,
        Col,
    },
    data() {
        return {
            show: false,
        }
    },
    computed: {
        icon() {
            return this.show ? 'caret-down' : 'caret-up'
        }
    },
    methods: {
        toggleShow() {
            this.show = ! this.show
        }
    }
}
</script>