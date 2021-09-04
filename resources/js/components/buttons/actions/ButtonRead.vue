<template>
    <Button color="info" size="sm" @click="$emit('click', $event)">
        <ButtonReadContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonReadContent from '../contents/ButtonReadContent'

export default {
    components: {
        Button,
        ButtonReadContent
    }
}
</script>