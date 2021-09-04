<template>
    <Button color="light" size="sm" @click="$emit('click', $event)">
        <ButtonActivateContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonActivateContent from '../contents/ButtonActivateContent'

export default {
    components: {
        Button,
        ButtonActivateContent
    }
}
</script>