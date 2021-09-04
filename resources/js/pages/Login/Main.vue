<template>
    <Layout>
        <!-- Mobile -->
        <template v-slot:mobile>
            <cb-row class="justify-content-center">
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
            </cb-row>
        </template>
        <!-- Desktop -->
        <template v-slot:desktop>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-4">
                    <Title />
                    <cb-card class="mt-5">
                        <cb-card-body class="p-5">
                            <WelcomeMessage />
                            <Description />
                            <StandardForm v-show="pageMeta.standardLogin" />
                            <TokenForm v-show="!pageMeta.standardLogin" />
                            <SwitchLoginModeLink
                                :standard-mode-val="pageMeta.standardLogin"
                                @toggleMode="toggleLoginMode"
                            />
                        </cb-card-body>
                    </cb-card>
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