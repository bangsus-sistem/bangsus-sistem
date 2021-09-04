<template>
    <ListGroup>
        <slot v-if="items.length > 0" />
        <ListGroupItem v-else class="text-center">
            {{ emptyLabel }}
        </ListGroupItem>
    </ListGroup>
</template>

<script>
import ListGroup from './ListGroup'
import ListGroupItem from './ListGroupItem'

export default {
    components: {
        ListGroup,
        ListGroupItem,
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
    }
}
</script>