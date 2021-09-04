<template>
    <a :class="'btn ' + buttonClass">
        <slot></slot>
    </a>
</template>

<script>
export default {
    props: {
        size: {
            type: String,
            default: 'md'
        },
        buttonType: {
            type: String,
            default: 'regular',
        },
        color: {
            type: String,
            default: 'primary'
        },
    },
    computed: {
        buttonClass() {
            let buttonSizeClass
            let buttonTypeColorClass

            switch (this.size) {
                case 'sm' :
                    buttonSizeClass = 'btn-sm'
                    break
                case 'lg' :
                    buttonSizeClass = 'btn-lg'
                    break
                case 'md' :
                default :
                    buttonSizeClass = ''
            }

            buttonTypeColorClass = 'btn-'
            switch (this.buttonType) {
                case 'outline' :
                    buttonTypeColorClass += 'outline-'
                    break
                default :
                    buttonTypeColorClass += ''
            }

            switch (this.color) {
                case 'primary' :
                case 'secondary' :
                case 'success' :
                case 'danger' :
                case 'warning' :
                case 'info' :
                case 'light' :
                    buttonTypeColorClass += this.color
                    break
                case 'dark' :
                default :
                    buttonTypeColorClass = ''
            }

            return buttonSizeClass + ' ' + buttonTypeColorClass
        }
    },
}
</script>