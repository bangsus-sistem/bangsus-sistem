<template>
    <fragment>
        <h3>Tipe Alamat</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.branchType' }"
            >
                <h5 class="mb-3">Ubah Tipe Alamat</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/system/branch_type', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'system.branchType' }))
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