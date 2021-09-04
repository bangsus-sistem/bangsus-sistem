<template>
    <InputGroup>
        <InputGroupPrepend v-if="prependLabel">
            <InputGroupText :label="prependLabel" />
        </InputGroupPrepend>
        <Input
            :type="type"
            :value="value"
            @input="$emit('input', $event)"
            :readonly="readonly"
            :class="{ 'is-invalid': hasError }"
        />
        <InputGroupAppend v-if="appendLabel">
            <InputGroupText :label="appendLabel" />
        </InputGroupAppend>
    </InputGroup>
</template>

<script>
import InputGroup from './InputGroup'
import InputGroupPrepend from './InputGroupPrepend'
import Input from './Input'
import InputGroupAppend from './InputGroupAppend'
import InputGroupText from './InputGroupText'

export default {
    components: {
        InputGroup,
        InputGroupPrepend,
        Input,
        InputGroupAppend,
        InputGroupText,
    },
    props: {
        type: {
            type: String,
            default: 'text',
        },
        value: {
            default: '',
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
        hasError: {
            type: Boolean,
            default: false,
        }
    },
}
</script>