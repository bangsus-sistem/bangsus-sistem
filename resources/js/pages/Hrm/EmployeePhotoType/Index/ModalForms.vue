<template>
    <fragment>
        <bsb-access-wrapper module-ref="employee_photo_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Foto Karyawan"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/employee_photo_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Foto Karyawan"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/employee_photo_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="employee_photo_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Foto Karyawan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/employee_photo_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>