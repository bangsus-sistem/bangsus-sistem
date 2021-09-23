<template>
    <fragment>
        <bsb-access-wrapper module-ref="employee_assignment" action-ref="admit">
            <bsb-modal-form
                title="Terima Pengajuan Penugasan Karyawan"
                message="Apakah anda yakin?"
                ref="admit"
                link="/ajax/hrm/employee_assignment/admit"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="employee_assignment" action-ref="delete">
            <bsb-modal-form
                title="Hapus Penugasan Karyawan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/employee_assignment"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>