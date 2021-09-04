<template>
    <div>
        <InputAppendPrepend
            :type="type"
            :value="value"
            @input="$emit('input', $event)"
            :has-error="errors.length > 0"
            :readonly="readonly"
            :prepend-label="prependLabel"
            :append-label="appendLabel"
        />
        <ErrorsWrapper :errors="errors" />
    </div>
</template>

<script>
import InputAppendPrepend from './InputAppendPrepend'
import ErrorsWrapper from '../form/ErrorsWrapper'

export default {
    components: {
        InputAppendPrepend,
        ErrorsWrapper,
    },
    props: {
        type: {
            type: String,
            default: 'text',
        },
        value: {
            default: '',
        },
        errors: {
            type: Array,
            default() {
                return []
            },
        },
        readonly: {
            type: Boolean,
            default: false,
        },
        prependLabel: {
            default: null
        },
        appendLabel: {
            default: null
        },
    },
}
</script>