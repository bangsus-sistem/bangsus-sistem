<template>
    <fragment>
        <h3>Parameter Kedisiplinan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'master.disciplinaryParameter' }"
            >
                <h5 class="mb-3">Tambah Parameter Kedisiplinan</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/master/disciplinary_parameter', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'master.disciplinaryParameter' }))
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
                        <label>Pilihan</label>
                        <DisciplinaryValueTable v-model="form.data['disciplinary_values']" :errors="form.errors['disciplinary_values']" />
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
import DisciplinaryValueTable from '../common/DisciplinaryValueTable'

export default {
    mixins: [mixin],
    components: {
        DisciplinaryValueTable,
    },
}
</script>