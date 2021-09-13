<template>
    <fragment>
        <bsb-access-wrapper module-ref="blood_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Golongan Darah"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/hrm/blood_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Golongan Darah"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/hrm/blood_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="blood_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Golongan Darah"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/hrm/blood_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>