<template>
    <div>
        <div class="row justify-content-between mx-1">
            <div class="col p-0 m-0 text-truncate">
                <slot name="content" />
            </div>
            <div class="col p-0 my-auto text-right align-items-middle">
                <slot name="right" />
            </div>
        </div>
        <div class="row mx-1">
            <div class="col p-0">
                <slot name="footer" />
            </div>
        </div>
    </div>
</template>