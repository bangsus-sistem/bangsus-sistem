<template>
    <Layout>
        <!-- Mobile -->
        <template v-slot:mobile>
            <bsb-row class="justify-content-center">
                <div class="col-12 col-md-10">
                    <Title />
                    <WelcomeMessage class="mt-5" />
                    <Description />
                    <StandardForm v-show="pageMeta.standardLogin" />
                    <TokenForm v-show="!pageMeta.standardLogin" />
                    <SwitchLoginModeLink
                        :standard-mode-val="pageMeta.standardLogin"
                        @toggleMode="toggleLoginMode"
                    />
                </div>
            </bsb-row>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4">
                    <Title />
                    <bsb-card class="mt-5">
                        <bsb-card-body class="p-5">
                            <WelcomeMessage />
                            <Description />
                            <StandardForm v-show="pageMeta.standardLogin" />
                            <TokenForm v-show="!pageMeta.standardLogin" />
                            <SwitchLoginModeLink
                                :standard-mode-val="pageMeta.standardLogin"
                                @toggleMode="toggleLoginMode"
                            />
                        </bsb-card-body>
                    </bsb-card>
                </div>
            </div>
        </template>
    </Layout>
</template>

<script>
import Layout from '../../layouts/Blank'
import Title from './sections/Title'
import WelcomeMessage from './sections/WelcomeMessage'
import Description from './sections/Description'
import StandardForm from './sections/StandardForm'
import TokenForm from './sections/TokenForm'
import SwitchLoginModeLink from './sections/SwitchLoginModeLink'

export default {
    components: {
        Layout,
        Title,
        WelcomeMessage,
        Description,
        StandardForm,
        TokenForm,
        SwitchLoginModeLink,
    },
    data() {
        return {
            pageMeta: {
                standardLogin: true,
            }
        }
    },
    methods: {
        toggleLoginMode(val) {
            this.pageMeta.standardLogin = val
        }
    },
    created() {
        this.$store.dispatch('utils/history/reset')
    },
}
</script>