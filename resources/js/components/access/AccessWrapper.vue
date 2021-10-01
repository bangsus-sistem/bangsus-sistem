<template>
    <fragment>
        <slot v-if="show" />
    </fragment>
</template>

<script>
export default {
    props: {
        moduleRef: {
            required: true,
            type: String,
        },
        actionRef: {
            required: true,
            type: String,
        },
    },
    data() {
        return {
            show: false,
        }
    },
    created() {
        const moduleRef = this.moduleRef
        const actionRef = this.actionRef
        const featureAuth = this.$store.getters['utils/auth/features']
        const feature = lodash.find(featureAuth, (feature) => {
            return feature['module']['ref'] == moduleRef && feature['action']['ref'] == actionRef
        })

        this.show = feature != undefined
    }
}
</script>