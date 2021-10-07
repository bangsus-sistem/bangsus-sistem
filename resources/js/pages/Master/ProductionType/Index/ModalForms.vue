<template>
    <fragment>
        <bsb-access-wrapper module-ref="production_type" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Tipe Produksi"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/production_type/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Tipe Produksi"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/production_type/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="production_type" action-ref="delete">
            <bsb-modal-form
                title="Hapus Tipe Produksi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/production_type"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>