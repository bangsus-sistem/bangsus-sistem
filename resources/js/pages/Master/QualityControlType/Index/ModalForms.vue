<template>
    <fragment>
        <bsb-access-wrapper module-ref="quality_control_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Quality Control"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/quality_control_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Quality Control"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/quality_control_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="quality_control_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Quality Control"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/quality_control_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>