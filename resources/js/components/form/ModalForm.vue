<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" :id="id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ title }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ message }}
                        <slot>
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <ButtonSpinner
                            type="button"
                            color="primary"
                            @click="submit"
                            :loading="state.loading"
                        >
                            {{ submitButtonText }}
                        </ButtonSpinner>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import mixins from '../../mixins'
import ButtonSpinner from '../buttons/ButtonSpinner'

export default {
    components: {
        ButtonSpinner,
    },
    mixins: [mixins],
    props: {
        data: {
            type: Object,
            default() {
                return {}
            }
        },
        method: {
            type: String,
            required: true,
        },
        link: {
            type: String,
            required: true,
        },
        title: {
            type: String,
            default: '',
        },
        message: {
            type: String,
            default: '',
        },
        submitButtonText: {
            type: String,
            default: 'Ya',
        },
    },
    data() {
        return {
            mutated: {
                data: null,
                method: null,
                link: null,
            },
            state: {
                loading: false,
            },
            id: null,

            form: {
                errors: {

                }
            }
        }
    },
    computed: {
        computedData() {
            return this.mutated.data == null ? this.data : this.mutated.data
        },
        computedMethod() {
            return this.mutated.method == null ? this.method : this.mutated.method
        },
        computedLink() {
            return this.mutated.link == null ? this.link : this.mutated.link
        },
    },
    created() {
        this.id = uuid.v4()
    },
    methods: {
        setData(data) {
            this.mutated.data = data
        },
        setLink(link) {
            this.mutated.link = link
        },
        setMethod(method) {
            this.mutated.method = method
        },

        show() {
            $('#' + this.id).modal('show')
        },
        hide() {
            $('#' + this.id).modal('hide')
        },

        startLoading() {
            this.state.loading = true
        },
        stopLoading() {
            this.state.loading = false
        },

        initiateSubmit() {
            this.startLoading()
        },
        afterSubmit() {
            this.stopLoading()
            this.hide()
        },

        submit() {
            this.initiateSubmit()
            let success = res => {
                this.afterSubmit()
                this.flashFormSuccess()
                this.$emit('success', res)
            }
            let failed = err => {
                this.afterSubmit()
                this.handleModalFormError(err)
                this.$emit('failed', err)
            }

            switch (this.computedMethod) {
                case 'get' :
                case 'post' :
                case 'put' :
                case 'patch' :
                    axios[this.computedMethod](this.computedLink, this.computedData)
                        .then(success)
                        .catch(failed)
                    break
                case 'delete' :
                    axios[this.computedMethod](this.computedLink, { data: this.computedData })
                        .then(success)
                        .catch(failed)
                    break
            }

            
        }
    },
}
</script>