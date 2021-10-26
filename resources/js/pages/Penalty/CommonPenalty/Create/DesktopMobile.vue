<template>
    <fragment>
        <h3>Denda Umum</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'penalty.commonPenalty' }"
            >
                <h5 class="mb-3">Tambah Denda Umum</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/penalty/common_penalty', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'penalty.commonPenalty' }))
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
                        <label>Bulan</label>
                        <bsb-input-errors type="month" v-model="form.data['month']" :errors="form.errors['month']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Total</label>
                        <bsb-input-errors type="number" v-model="form.data['total']" :errors="form.errors['total']" />
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