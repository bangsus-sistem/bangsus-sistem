<template>
    <fragment>
        <h3>Foto Operasional Minimum</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.operationalPhotoType' }"
            >
                <h5 class="mb-3">Ubah Foto Operasional Minimum</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/master/minimum_operational_photo', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'master.operationalPhotoType' }))
                    "
                >
                    <bsb-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cabang</th>
                                <th>Minimum</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(minimum, i) in form.data['minimum']" :key="i">
                                <td>{{ i + 1 }}</td>
                                <td>{{ findBranch(minimum['branch_id']) }}</td>
                                <td>
                                    <bsb-input v-model="form.data['minimum'][i]['minimum']" />
                                </td>
                            </tr>
                        </tbody>
                    </bsb-table>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>