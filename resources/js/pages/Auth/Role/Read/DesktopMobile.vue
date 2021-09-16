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
                <h5 class="mb-3">Lihat Role</h5>
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
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Status</label>
                        <div>
                            <bsb-switch-badge :condition="form.data['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        </div>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Fitur</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_features']"
                            :readonly="true"
                        />
                        <FeatureTable
                            class="mt-1"
                            :all-features="form.data['all_features']"
                            :resources="resources"
                            v-model="form.data['feature_ids']"
                            :readonly="true"
                        />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Widget</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_widgets']"
                            :readonly="true"
                        />
                        <WidgetTable
                            class="mt-1"
                            :all-widgets="form.data['all_widgets']"
                            :resources="resources"
                            v-model="form.data['widget_ids']"
                            :readonly="true"
                        />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Laporan</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_reports']"
                            :readonly="true"
                        />
                        <ReportTable
                            class="mt-1"
                            :all-reports="form.data['all_reports']"
                            :resources="resources"
                            v-model="form.data['report_ids']"
                            :readonly="true"
                        />
                    </bsb-form-group>
                </form>
                <!-- User -->
                <bsb-access-wrapper module-ref="user" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('user')">
                            User <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['user'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['user'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['user'].counts" v-model="query['user'].count" @input="search('user')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <UserDataQuery
                                        :loading="state.result['user'].loading"
                                        :resources="resources"
                                        @search="search"
                                        v-model="query['user']"
                                        :fl-with-role="false"
                                    />
                                    <bsb-tr-sort
                                        :sort-orders="meta['user'].sortOrders"
                                        :sort="query['user']['sort']"
                                        :order="query['user']['order']"
                                        v-model="query['user']"
                                        @sort="changeSortOrder($event, true, 'user')"
                                    />
                                </thead>
                                <bsb-tbody-empty :items="result['user'].items" :col="meta['user'].sortOrders.length">
                                    <UserDataRow
                                        v-for="(item, i) in result['user'].items"
                                        :key="i"
                                        :num="i + 1"
                                        :item="item"
                                        @activate="showModalForm('user', 'activate', { id: item['id'] })"
                                        @deactivate="showModalForm('user', 'deactivate', { id: item['id'] })"
                                        @delete="showModalForm('user', 'delete', { id: item['id'] })"
                                        :fl-with-role="false"
                                    />
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['user'].meta['first_item']"
                                    :last-item="result['user'].meta['last_item']"
                                    :total="result['user'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['user'].page" :last-page="result['user'].meta['last_page']" @changed="search('user')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End User -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
        <!-- Modal Form -->
        <UserModalForms ref="user" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import UserDataQuery from '../../User/Index/DataQuery'
import UserDataRow from '../../User/Index/DataRow'
import UserModalForms from '../../User/Index/ModalForms'
import FeatureTable from '../common/FeatureTable'
import WidgetTable from '../common/WidgetTable'
import ReportTable from '../common/ReportTable'

export default {
    mixins: [mixin],
    components: {
        UserDataQuery,
        UserDataRow,
        UserModalForms,
        FeatureTable,
        WidgetTable,
        ReportTable,
    },
}
</script>