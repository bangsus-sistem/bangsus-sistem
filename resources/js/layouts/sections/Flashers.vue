<template>
    <cb-flashers :flashers="flashers" @closed="closeFlasher($event)" />
</template>

<script>
export default {
    computed: {
        flashers() {
            return this.$store.getters['utils/flashers/flashers']
        },
    },
    methods: {
        closeFlasher(id) {
            this.$store.dispatch('utils/flashers/closeFlasher', id)
        }
    },
    created() {
        this.$store.dispatch('utils/flashers/buildStoredFlashersTimeout')
    },
}
</script>