<template>
    <fragment>
        <h3>Pengajuan Jadwal</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Pengajuan Jadwal</h5>
            <bsb-access-wrapper module-ref="schedule_submission" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'hrm.scheduleSubmission.create' }" />
            </bsb-access-wrapper>
            <bsb-access-wrapper module-ref="schedule_submission" action-ref="create">
                <bsb-button-router-link size="sm" color="info" :to="{ name: 'hrm.scheduleSubmission.createMonthly' }">
                    Tambah Bulanan
                </bsb-button-router-link>
            </bsb-access-wrapper>
            <ScheduleSubmissionDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <ScheduleSubmissionDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @admit="showModalForm('scheduleSubmission', 'admit', { id: item['id'] })"
                    @delete="showModalForm('scheduleSubmission', 'delete', { id: item['id'] })"
                />
            </bsb-list-group-empty>
        </bsb-mobile-card-spinner-error>
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