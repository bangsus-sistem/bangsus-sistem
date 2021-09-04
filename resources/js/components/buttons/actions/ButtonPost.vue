<template>
    <Button color="success" size="sm" @click="$emit('click', $event)">
        <ButtonPostContent />
    </Button>
</template>

<script>
import Button from '../Button'
import ButtonPostContent from '../contents/ButtonPostContent'

export default {
    components: {
        Button,
        ButtonPostContent
    }
}
</script>