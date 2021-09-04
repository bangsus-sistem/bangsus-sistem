<template>
    <Button color="primary" size="sm" @click="$emit('click', $event)">
        <ButtonCreateContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonCreateContent from '../contents/ButtonCreateContent'

export default {
    components: {
        Button,
        ButtonCreateContent
    }
}
</script>