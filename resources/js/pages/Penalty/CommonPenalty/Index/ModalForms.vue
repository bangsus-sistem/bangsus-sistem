<template>
    <fragment>
        <bsb-access-wrapper module-ref="common_penalty" action-ref="delete">
            <bsb-modal-form
                title="Hapus Denda Umum"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/penalty/common_penalty"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>