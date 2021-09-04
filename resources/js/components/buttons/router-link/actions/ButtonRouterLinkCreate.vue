<template>
    <ButtonRouterLink
        color="primary"
        size="sm"
        :to="to"
    >
        <ButtonCreateContent />
    </ButtonRouterLink>
</template>

<script>
import ButtonRouterLink from '../ButtonRouterLink'
import ButtonCreateContent from '../../contents/ButtonCreateContent'

export default {
    components: {
        ButtonRouterLink,
        ButtonCreateContent,
    },
    props: {
        to: {
            required: true
        }
    }
}
</script>