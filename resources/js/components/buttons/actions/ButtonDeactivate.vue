<template>
    <Button color="dark" size="sm" @click="$emit('click', $event)">
        <ButtonDeactivateContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonDeactivateContent from '../contents/ButtonDeactivateContent'

export default {
    components: {
        Button,
        ButtonDeactivateContent
    }
}
</script>