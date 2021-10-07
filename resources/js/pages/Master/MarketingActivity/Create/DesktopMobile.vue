<template>
    <fragment>
        <h3>Aktivitas Marketing</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.marketingActivity' }"
            >
                <h5 class="mb-3">Tambah Aktivitas Marketing</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/master/marketing_activity', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'master.marketingActivity' }))
                    "
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-errors v-model="form.data['code']" :errors="form.errors['code']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input-errors v-model="form.data['name']" :errors="form.errors['name']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
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