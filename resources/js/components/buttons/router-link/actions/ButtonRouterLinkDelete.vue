<template>
    <ButtonRouterLink
        color="danger"
        button-type="regular"
        size="sm"
        :to="to"
    >
        <ButtonDeleteContent />
    </ButtonRouterLink>
</template>

<script>
import ButtonRouterLink from '../ButtonRouterLink'
import ButtonDeleteContent from '../../contents/ButtonDeleteContent'

export default {
    components: {
        ButtonRouterLink,
        ButtonDeleteContent,
    },
    props: {
        to: {
            required: true
        }
    }
}
</script>