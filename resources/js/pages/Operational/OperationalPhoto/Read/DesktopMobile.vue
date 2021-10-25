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
                <h5 class="mb-3">Lihat Form Foto Operasional</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-input :value="form.data['branch']['code'] + ' - ' + form.data['branch']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Gambar</label>
                        <bsb-image-viewer :id="form.data['image_id']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tipe Foto Operasional</label>
                        <bsb-input :value="form.data['operational_photo_type']['code'] + ' - ' + form.data['operational_photo_type']['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
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