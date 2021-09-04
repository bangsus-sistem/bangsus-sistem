<template>
    <Button color="danger" size="sm" @click="$emit('click', $event)">
        <ButtonDeleteContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonDeleteContent from '../contents/ButtonDeleteContent'

export default {
    components: {
        Button,
        ButtonDeleteContent
    }
}
</script>