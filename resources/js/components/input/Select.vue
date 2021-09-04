<template>
    <select
        :type="type"
        :class="'form-control ' + selectSize"
        :value="value"
        @input="$emit('input', $event.target.value)"
        :disabled="disabled"
        @change="$emit('change', $event.target.value)"
    >
        <option v-for="(option, i) in options" :key="i" :value="option.value">
            {{ option.title }}
        </option>
        <slot></slot>
    </select>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'text',
        },
        value: {
            default: ''
        },
        size: {
            type: String,
            default: 'md'
        },
        options: {
            type: Array,
            default() {
                return []
            }
        },
        disabled: {
            type: Boolean,
            default: false
        }
    },
    computed: {
        selectSize() {
            let selectSize = ''

            switch (this.size) {
                case 'sm' :
                case 'lg' :
                    selectSize += 'form-control-' + this.size
                    break
                default :
                    selectSize = ''
            }

            return selectSize
        }
    }
}
</script>