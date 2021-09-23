<template>
    <Button color="secondary" size="sm" @click.prevent="click">
        <ButtonBackContent />
    </Button>
</template>

<script>
import Button from '../../Button'
import ButtonBackContent from '../../contents/ButtonBackContent'

export default {
    components: {
        Button,
        ButtonBackContent,
    },
    props: {
        defaultBack: {
            default() {
                return { name: 'dashboard' }
            }
        }
    },
    methods: {
        click() {
            const route = this.$store.getters['utils/history/latestBeforeDeep']
            if (route != null) {
                this.$store.dispatch('utils/history/deleteLatest')
                this.$router.replace({ name: route.name, query: route.query })
            } else {
                this.$router.replace(this.defaultBack)
            }
        },
    }
}
</script>