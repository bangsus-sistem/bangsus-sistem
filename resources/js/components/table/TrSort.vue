<template>
    <tr>
        <Th>#</Th>
        <ThSort
            v-for="(sortOrder, i) in sortOrders"
            :key="i"
            :sort="sort == sortOrder.index"
            :order="order"
            @click="clickSortOrder(sortOrder.index)"
        >
            {{ sortOrder.title }}
        </ThSort>
        <Th justify="center">
            Aksi
        </Th>
    </tr>
</template>

<script>
import Th from './Th'
import ThSort from './ThSort'

export default {
    components: {
        Th,
        ThSort,
    },
    props: {
        sortOrders: {
            type: Array,
            default() {
                return []
            },
        },
        value: {
            type: Object,
            default() {
                return {}
            },
        },
        sort: {
            type: String,
            required: true,
        },
        order: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            query: {}
        }
    },
    created() {
        this.query = this.value
    },
    watch: {
        query(ne, old) {
            this.$emit('input', ne)
        }
    },
    methods: {
        clickSortOrder(index) {
            this.$emit('sort', index)
        }
    }
}
</script>