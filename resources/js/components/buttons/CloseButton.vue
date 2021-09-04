<template>
    <button type="button" class="close" @click="click($event)">
        <Icon icon="times" />
    </button>
</template>

<script>
import Icon from '../icons/Icon'

export default {
    components: {
        Icon,
    },
    methods: {
        click(event) {
            this.$emit('click', event)
        }
    }
}
</script>