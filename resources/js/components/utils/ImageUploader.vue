<template>
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" @change="uploadImage">
        <label class="custom-file-label">Pilih Gambar</label>
    </div>
</template>

<script>
export default {
    props: {
        value: {
            default: ''
        },
    },
    data() {
        return {
            id: null
        }
    },
    methods: {
        uploadImage(e) {
            let data = new FormData()
            data.append('image', e.target.files[0])

            axios.post('/storage/image', data)
                .then(res => {
                    const newId = res.data.id
                    if (this.id != null) {
                        axios.delete('/storage/image/' + this.id)
                            .then(res => {
                                this.id = newId
                                this.$emit('input', this.id)
                                console.log('emitted')
                            })
                    } else {
                        this.id = newId
                        this.$emit('input', this.id)
                    }
                })
        }
    }
}
</script>