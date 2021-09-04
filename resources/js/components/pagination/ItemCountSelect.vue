<template>
    <Select size="sm"
        :options="countOptions"
        :value="value"
        @input="$emit('input', $event)"
    />
</template>

<script>
import Select from '../input/Select'

export default {
    components: {
        Select,
    },
    props: {
        options: {
            type: Array,
            default() {
                return []
            }
        },
        value: {
            
        }
    },
    computed: {
        countOptions() {
            let options = []

            this.options.forEach(val => {
                options.push({
                    value: parseInt(val),
                    title: val.toString(),
                })
            })

            return options
        }
    }
}
</script>