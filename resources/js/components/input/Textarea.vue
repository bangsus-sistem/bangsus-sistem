<template>
    <textarea
        :class="'form-control ' + textareaSize"
        :value="value"
        @input="$emit('input', $event.target.value)"
        :readonly="readonly"
    />
</template>

<script>
export default {
    props: {
        value: {
            default: ''
        },
        size: {
            type: String,
            default: 'md'
        },
        readonly: {
            type: Boolean,
            default: false,
        }
    },
    computed: {
        textareaSize() {
            let textareaSize = ''

            switch (this.size) {
                case 'sm' :
                case 'lg' :
                    textareaSize += 'form-control-' + this.size
                    break
                default :
                    textareaSize = ''
            }

            return textareaSize
        }
    },
}
</script>