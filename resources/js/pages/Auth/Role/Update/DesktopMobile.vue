<template>
    <fragment>
        <h3>Role</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'auth.role' }"
            >
                <h5 class="mb-3">Ubah Role</h5>
                <bsb-user-timestamps
                    :user-create="form.data['user_create']"
                    :created-at="form.data['created_at']"
                    :user-update="form.data['user_update']"
                    :updated-at="form.data['updated_at']"
                />
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/auth/role', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => back({ name: 'auth.role' }))
                    "
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-errors v-model="form.data['code']" :errors="form.errors['code']" :readonly="true" />
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
                    <bsb-form-group>
                        <label>Fitur</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_features']"
                        />
                        <FeatureTable
                            class="mt-1"
                            :all-features="form.data['all_features']"
                            :resources="resources"
                            v-model="form.data['feature_ids']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['feature_ids']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Widget</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_widgets']"
                        />
                        <WidgetTable
                            class="mt-1"
                            :all-widgets="form.data['all_widgets']"
                            :resources="resources"
                            v-model="form.data['widget_ids']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['widget_ids']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Laporan</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_reports']"
                        />
                        <ReportTable
                            class="mt-1"
                            :all-reports="form.data['all_reports']"
                            :resources="resources"
                            v-model="form.data['report_ids']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['report_ids']" />
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
import FeatureTable from '../common/FeatureTable'
import WidgetTable from '../common/WidgetTable'
import ReportTable from '../common/ReportTable'

export default {
    mixins: [mixin],
    components: { FeatureTable, WidgetTable, ReportTable },
}
</script>