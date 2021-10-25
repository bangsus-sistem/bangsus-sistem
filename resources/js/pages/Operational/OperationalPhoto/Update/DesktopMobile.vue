<template>
    <fragment>
        <h3>Form Foto Operasional</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'operational.operationalPhoto' }"
            >
                <h5 class="mb-3">Ubah Form Foto Operasional</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/operational/operational_photo', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'operational.operationalPhoto' }))
                    "
                >
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-select-errors v-model="form.data['branch_id']" :errors="form.errors['branch_id']">
                            <option :value="null">-- Pilih Cabang --</option>
                            <bsb-option-active
                                v-for="(branch, i) in resources['branches']"
                                :key="i"
                                :value="branch['id']"
                                :item="branch"
                            >
                                {{ branch['code'] }} - {{ branch['name'] }}
                            </bsb-option-active>
                        </bsb-select-errors>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar</label>
                        <bsb-image-viewer :id="form.data['image_id']" />
                        <bsb-image-uploader v-model="form.data['image_id']" />
                        <bsb-errors-wrapper :errors="form.errors['image_id']" />
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