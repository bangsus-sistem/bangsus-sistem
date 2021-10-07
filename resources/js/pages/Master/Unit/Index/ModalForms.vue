<template>
    <fragment>
        <bsb-access-wrapper module-ref="unit" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Satuan"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/unit/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Satuan"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/unit/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="unit" action-ref="delete">
            <bsb-modal-form
                title="Hapus Satuan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/unit"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>