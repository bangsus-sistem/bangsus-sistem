<template>
    <Button color="none" @click="click" class="p-0">
        <FeatherIcon icon="menu" :size="20" class="sidebar-bars-button" :color="color" />
    </Button>
</template>

<script>
import Button from '../buttons/Button'
import FeatherIcon from '../icons/FeatherIcon'

export default {
    components: {
        Button,
        FeatherIcon,
    },
    props: {
        darkMode: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        click(e) {
            this.$emit('click', e)
        }
    },
    computed: {
        color() {
            return this.darkMode ? 'white' : 'black'
        }
    }
}
</script>