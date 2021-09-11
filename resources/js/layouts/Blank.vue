<template>
    <div>
        <bsb-screen>
            <template v-slot:mobile>
                <bsb-container-fluid class="px-3">
                    <slot name="mobile" />
                </bsb-container-fluid>
                <bsb-screen-mode-wrapper label="Mode Mobile" />
            </template>
            <template v-slot:desktop>
                <bsb-container-fluid>
                    <slot name="desktop" />
                </bsb-container-fluid>
                <bsb-screen-mode-wrapper label="Mode Desktop" />
            </template>
        </bsb-screen>
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