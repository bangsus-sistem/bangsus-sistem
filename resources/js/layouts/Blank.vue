<template>
    <div>
        <cb-screen>
            <template v-slot:mobile>
                <cb-container-fluid class="px-3">
                    <slot name="mobile" />
                </cb-container-fluid>
                <cb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <template v-slot:desktop>
                <cb-container-fluid>
                    <slot name="desktop" />
                </cb-container-fluid>
                <cb-screen-mode-wrapper label="Mode Desktop" />
            </template>
        </cb-screen>
        <Flashers />
    </div>
</template>

<script>
import Flashers from './sections/Flashers'

export default {
    components: {
        Flashers,
    },
}
</script>