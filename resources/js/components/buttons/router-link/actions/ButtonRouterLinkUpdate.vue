<template>
    <ButtonRouterLink
        color="warning"
        size="sm"
        :to="to"
    >
        <ButtonUpdateContent />
    </ButtonRouterLink>
</template>

<script>
import ButtonRouterLink from '../ButtonRouterLink'
import ButtonUpdateContent from '../../contents/ButtonUpdateContent'

export default {
    components: {
        ButtonRouterLink,
        ButtonUpdateContent,
    },
    props: {
        to: {
            required: true
        }
    }
}
</script>