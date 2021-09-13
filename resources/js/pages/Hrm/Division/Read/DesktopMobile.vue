<template>
    <fragment>
        <h3>Divisi</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.division' }"
            >
                <h5 class="mb-3">Lihat Divisi</h5>
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
                </form>
                <!-- Job Title -->
                <bsb-access-wrapper module-ref="job_title" action-ref="index">
                    <div>
                        <label @click.prevent="toggleShow('job_title')">
                            Jabatan <bsb-switch-icon true-icon="angle-down" false-icon="angle-up" v-model="meta['job_title'].show" :single-color="true" />
                        </label>
                        <bsb-table-responsive class="p-1 my-3" v-if="meta['job_title'].show">
                            <bsb-table-responsive-header>
                                <bsb-item-count :options="meta['job_title'].counts" v-model="query['job_title'].count" @input="search('job_title')" />
                            </bsb-table-responsive-header>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <JobTitleDataQuery
                                        :loading="state.result['job_title'].loading"
                                        @search="search('job_title')"
                                        v-model="query['job_title']"
                                        :fl-with-division="false"
                                    />
                                    <bsb-tr-sort
                                        :sort-orders="meta['job_title'].sortOrders"
                                        :sort="query['job_title']['sort']"
                                        :order="query['job_title']['order']"
                                        v-model="query['job_title']"
                                        @sort="changeSortOrder($event, true, 'job_title')"
                                    />
                                </thead>
                                <bsb-tbody-empty :items="result['job_title'].items" :col="meta['job_title'].sortOrders.length">
                                    <JobTitleDataRow
                                        v-for="(item, i) in result['job_title'].items"
                                        :key="i"
                                        :num="i + 1"
                                        :item="item"
                                        @activate="showModalForm('job_title', 'activate', { id: item['id'] })"
                                        @deactivate="showModalForm('job_title', 'deactivate', { id: item['id'] })"
                                        @delete="showModalForm('job_title', 'delete', { id: item['id'] })"
                                        :fl-with-division="false"
                                    />
                                </bsb-tbody-empty>
                            </bsb-table>
                            <bsb-table-responsive-footer>
                                <bsb-data-index
                                    :first-item="result['job_title'].meta['first_item']"
                                    :last-item="result['job_title'].meta['last_item']"
                                    :total="result['job_title'].meta['total']"
                                />
                                <bsb-page-button-group v-model="query['job_title'].page" :last-page="result['job_title'].meta['last_page']" @changed="search('job_title')" />
                            </bsb-table-responsive-footer>
                        </bsb-table-responsive>
                    </div>
                </bsb-access-wrapper>
                <!-- End Job Title -->
            </bsb-card-body-spinner-error-back>
        </bsb-card>
        <!-- Modal Form -->
        <JobTitleModalForms ref="job_title" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import JobTitleDataQuery from '../../JobTitle/Index/DataQuery'
import JobTitleDataRow from '../../JobTitle/Index/DataRow'
import JobTitleModalForms from '../../JobTitle/Index/ModalForms'

export default {
    mixins: [mixin],
    components: {
        JobTitleDataQuery, JobTitleDataRow, JobTitleModalForms
    }
}
</script>