<template>
    <fragment>
        <h3>Pengajuan Jadwal</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Daftar Pengajuan Jadwal</h5>
                <bsb-access-wrapper module-ref="schedule_submission" action-ref="create">
                    <bsb-button-router-link-create :to="{ name: 'hrm.scheduleSubmission.create' }" />
                </bsb-access-wrapper>
                <bsb-table-responsive class="p-1 mt-3">
                    <bsb-table :hover="true">
                        <thead class="thead-light">
                            <ScheduleSubmissionDataQuery
                                :loading="state.result.loading"
                                @search="search"
                                v-model="query"
                            />
                            <bsb-tr-sort
                                :sort-orders="meta.sortOrders"
                                :sort="query['sort']"
                                :order="query['order']"
                                v-model="query"
                                @sort="changeSortOrder"
                            />
                        </thead>
                        <bsb-tbody-empty :items="result.items" :col="meta.sortOrders.length">
                            <ScheduleSubmissionDataRow
                                v-for="(item, i) in result.items"
                                :key="i"
                                :num="i + 1"
                                :item="item"
                                @delete="showModalForm('scheduleSubmission', 'delete', { id: item['id'] })"
                            />
                        </bsb-tbody-empty>
                    </bsb-table>
                </bsb-table-responsive>
            </bsb-card-body-spinner-error>
        </bsb-card>
        <!-- Modal Form -->
        <ScheduleSubmissionModalForms ref="scheduleSubmission" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import ScheduleSubmissionDataQuery from './DataQuery'
import ScheduleSubmissionDataRow from './DataRow'
import ScheduleSubmissionModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { ScheduleSubmissionDataQuery, ScheduleSubmissionDataRow, ScheduleSubmissionModalForms },
}
</script>