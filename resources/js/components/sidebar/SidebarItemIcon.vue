<template>
    <FeatherIcon :icon="icon" :size="20" class="sidebar-item-icon" />
</template>

<script>
import FeatherIcon from '../icons/FeatherIcon'

export default {
    components: {
        FeatherIcon,
    },
    props: {
        icon: {
            required: true,
            type: String,
        },
    }
}
</script>