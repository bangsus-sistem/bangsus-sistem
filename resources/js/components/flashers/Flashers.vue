<template>
    <FlasherWrapper>
        <AlertDismissible
            v-for="(flasher, i) in flashers"
            :color="flasher.color"
            :key="i"
            :prevent-on-click="true"
            @closed="closed(flasher.id)"
        >
            {{ flasher.content }}
        </AlertDismissible>
    </FlasherWrapper>
</template>

<script>
import FlasherWrapper from './FlasherWrapper'
import AlertDismissible from '../alerts/AlertDismissible'

export default {
    components: {
        FlasherWrapper,
        AlertDismissible,
    },
    props: {
        flashers: {
            type: Array,
            default() {
                return []
            }
        }
    },
    methods: {
        closed(id) {
            this.$emit('closed', id)
        }
    }
}
</script>