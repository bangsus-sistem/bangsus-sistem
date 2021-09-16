<template>
    <fragment>
        <h3>Absensi</h3>
        <bsb-mobile-card-spinner-error
            class="mt-3"
            :loading="state.page.loading"
            :error="state.page.error"
            :error-message="state.page.message"
        >
            <h5 class="mb-3">Daftar Absensi</h5>
            <bsb-access-wrapper module-ref="attendance" action-ref="create">
                <bsb-button-router-link-create :to="{ name: 'hrm.attendance.create' }" />
            </bsb-access-wrapper>
            <AttendanceDataQuery
                :loading="state.result.loading"
                @search="search"
                v-model="query"
            />
            <bsb-list-group-empty class="mt-3 shadow-sm" :items="result.items">
                <AttendanceDataRow
                    v-for="(item, i) in result.items"
                    :key="i"
                    :num="i + 1"
                    :item="item"
                    @delete="showModalForm('attendance', 'delete', { id: item['id'] })"
                />
            </bsb-list-group-empty>
        </bsb-mobile-card-spinner-error>
        <!-- Modal Form -->
        <AttendanceModalForms ref="attendance" @success="search" />
    </fragment>
</template>

<script>
import mixin from './mixin'
import AttendanceDataQuery from './DataQuery'
import AttendanceDataRow from './DataRow'
import AttendanceModalForms from './ModalForms'

export default {
    mixins: [mixin],
    components: { AttendanceDataQuery, AttendanceDataRow, AttendanceModalForms },
}
</script>