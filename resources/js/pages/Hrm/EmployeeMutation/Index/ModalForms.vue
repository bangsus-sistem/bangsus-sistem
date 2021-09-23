<template>
    <fragment>
        <bsb-access-wrapper module-ref="employee_mutation" action-ref="admit">
            <bsb-modal-form
                title="Terima Pengajuan Mutasi Karyawan"
                message="Apakah anda yakin?"
                ref="admit"
                link="/ajax/hrm/employee_mutation/admit"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="employee_mutation" action-ref="delete">
            <bsb-modal-form
                title="Hapus Mutasi Karyawan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/employee_mutation"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>