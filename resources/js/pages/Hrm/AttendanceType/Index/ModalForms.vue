<template>
    <fragment>
        <bsb-access-wrapper module-ref="attendance_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Absensi"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/attendance_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Absensi"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/attendance_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="attendance_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Absensi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/attendance_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>