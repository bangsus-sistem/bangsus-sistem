<template>
    <span :class="[{ 'badge': true }, badgeClass]" @click="$emit('click', $event)">
        <slot></slot>
    </span>
</template>

<script>
export default {
    props: {
        size: {
            type: String,
            default: 'md'
        },
        badgeType: {
            type: String,
            default: 'regular',
        },
        color: {
            type: String,
            default: 'primary'
        },
    },
    computed: {
        badgeClass() {
            let badgeSizeClass
            let badgeTypeClass
            let badgeColorClass

            switch (this.size) {
                case 'sm' :
                    badgeSizeClass = 'badge-sm'
                    break
                case 'lg' :
                    badgeSizeClass = 'badge-lg'
                    break
                case 'md' :
                default :
                    badgeSizeClass = ''
            }

            switch (this.badgeType) {
                case 'pill' :
                    badgeTypeClass = 'badge-pill'
                    break
                default :
                    badgeTypeClass = ''
            }

            badgeColorClass = 'badge-'
            switch (this.color) {
                case 'primary' :
                case 'secondary' :
                case 'success' :
                case 'danger' :
                case 'warning' :
                case 'info' :
                case 'light' :
                    badgeColorClass += this.color
                    break
                case 'dark' :
                default :
                    badgeColorClass = ''
            }

            return badgeSizeClass + ' ' + badgeTypeClass + ' ' + badgeColorClass
        }
    },
}
</script>