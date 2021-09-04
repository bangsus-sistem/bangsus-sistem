<template>
    <Button color="warning" size="sm" @click="$emit('click', $event)">
        <ButtonUpdateContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonUpdateContent from '../contents/ButtonUpdateContent'

export default {
    components: {
        Button,
        ButtonUpdateContent
    }
}
</script>