<template>
    <fragment>
        <bsb-access-wrapper module-ref="authentication_log" action-ref="delete">
            <bsb-modal-form
                title="Hapus Log Autentikasi"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/log/authentication_log"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>