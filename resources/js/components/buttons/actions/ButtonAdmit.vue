<template>
    <Button color="success" size="sm" @click="$emit('click', $event)">
        <ButtonAdmitContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonAdmitContent from '../contents/ButtonAdmitContent'

export default {
    components: {
        Button,
        ButtonAdmitContent
    }
}
</script>