<template>
    <ButtonRouterLink
        color="info"
        button-type="regular"
        size="sm"
        :to="to"
    >
        <ButtonReadContent />
    </ButtonRouterLink>
</template>

<script>
import ButtonRouterLink from '../ButtonRouterLink'
import ButtonReadContent from '../../contents/ButtonReadContent'

export default {
    components: {
        ButtonRouterLink,
        ButtonReadContent,
    },
    props: {
        to: {
            required: true
        }
    }
}
</script>