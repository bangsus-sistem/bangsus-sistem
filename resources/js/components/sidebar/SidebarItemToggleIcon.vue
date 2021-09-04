<template>
    <FeatherIcon icon="chevron-up" class="sidebar-item-toggle-icon" v-if="collapse" />
    <FeatherIcon icon="chevron-down" class="sidebar-item-toggle-icon" v-else />
</template>

<script>
import FeatherIcon from '../icons/FeatherIcon'

export default {
    components: {
        FeatherIcon,
    },
    props: {
        collapse: {
            type: Boolean,
        }
    }
}
</script>