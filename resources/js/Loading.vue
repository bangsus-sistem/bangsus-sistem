<template>
    <Layout>
        <template v-slot:mobile>
            <bsb-row>
                <div class="col text-center mt-5">
                    <div class="spinner-border text-gray-600" role="status"/>
                </div>
            </bsb-row>
            <bsb-row>
                <div class="col text-center mt-2 text-gray-600">
                    <h5>Loading</h5>
                </div>
            </bsb-row>
        </template>
        <template v-slot:desktop>
            <bsb-row>
                <div class="col text-center mt-5">
                    <div class="spinner-border text-gray-600" role="status"/>
                </div>
            </bsb-row>
            <bsb-row>
                <div class="col text-center mt-2 text-gray-600">
                    <h5>Loading</h5>
                </div>
            </bsb-row>
        </template>
    </Layout>
</template>

<script>
import Layout from './layouts/Blank'

export default {
    components: {
        Layout,
    }
}
</script>