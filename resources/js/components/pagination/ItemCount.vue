<template>
    <div class="d-block">
        <FormInline class="mb-2">
            <ItemCountLabel class="m-0 mr-3">Jumlah data per halaman: </ItemCountLabel>
            <ItemCountSelect :options="options" :value="value" @input="$emit('input', $event)" />
        </FormInline>
    </div>
</template>

<script>
import FormInline from '../form/FormInline'
import ItemCountLabel from './ItemCountLabel'
import ItemCountSelect from './ItemCountSelect'

export default {
    components: {
        FormInline,
        ItemCountLabel,
        ItemCountSelect,
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
    }
}
</script>