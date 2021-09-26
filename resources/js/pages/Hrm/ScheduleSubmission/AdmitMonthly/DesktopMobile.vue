<template>
    <fragment>
        <h3>Pengajuan Jadwal</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.scheduleSubmission' }"
            >
                <h5 class="mb-3">Terima Pengajuan Bulanan</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/hrm/schedule_submission/admit_monthly', 'patch', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'hrm.scheduleSubmission' }))
                    "
                >
                    <bsb-form-group>
                        <label>Bulan</label>
                        <bsb-input-errors type="month" step="1" v-model="form.data['month']" :errors="form.errors['month']" />
                    </bsb-form-group>
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