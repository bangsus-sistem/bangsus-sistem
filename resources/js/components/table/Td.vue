<template>
    <td
        :class="[
            justifyClass
        ]"
    >
        <slot></slot>
    </td>
</template>

<script>
export default {
    props: {
        justify: {
            type: String,
            default: 'left',
        }
    },
    computed: {
        justifyClass() {
            let justifyClass

            switch (this.justify) {
                case 'left' :
                    justifyClass = 'text-left'
                    break
                case 'center' :
                    justifyClass = 'text-center'
                    break
                case 'right' :
                    justifyClass = 'text-right'
                    break
                default :
            }

            return justifyClass
        }
    },
}
</script>