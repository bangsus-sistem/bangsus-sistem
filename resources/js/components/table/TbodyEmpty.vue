<template>
    <tbody>
        <slot v-show="items.length > 0" />
        <tr v-show="items.length <= 0">
            <Td :colspan="col + 2" justify="center">
                {{ emptyLabel }}
            </Td>
        </tr>
    </tbody>
</template>

<script>
import Td from './Td'

export default {
    components: {
        Td,
    },
    props: {
        items: {
            default() {
                return []
            }
        },
        emptyLabel: {
            type: String,
            default: 'Data tidak ada.',
        },
        col: {
            type: Number,
            required: true,
        },
    }
}
</script>