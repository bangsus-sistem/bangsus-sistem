<template>
    <fragment>
        <bsb-access-wrapper module-ref="disciplinary_parameter" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Parameter Kedisiplinan"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/disciplinary_parameter/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Parameter Kedisiplinan"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/disciplinary_parameter/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="disciplinary_parameter" action-ref="delete">
            <bsb-modal-form
                title="Hapus Parameter Kedisiplinan"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/disciplinary_parameter"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>