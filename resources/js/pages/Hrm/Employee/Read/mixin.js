import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetFormData(
            '/ajax/hrm/employee/' + this.$route.params.id,
            { resolve: true, reject: false },
            { startLoading: true, stopLoading: false },
            this.getFormDataCallback()
        )
            .then(res => {
                this.fetchAndSetMultipleResources({
                    'address_types': '/ajax/hrm/address_type/all',
                    'contact_types': '/ajax/hrm/contact_type/all',
                    'employee_photo_types': '/ajax/hrm/employee_photo_type/all',
                }, { resolve: true, reject: false }, { startLoading: false, stopLoading: true })
                    .then(res => {
                        this.resources['employee_photo_types'].forEach(employeePhotoType => {
                            let employeePhoto = lodash.find(this.form.data['employee_photos'], (e) => e['employee_photo_type_id'] == employeePhotoType['id'])
                            if (employeePhoto == undefined) {
                                this.form.data['employee_photos'].push({
                                    'employee_photo_type_id': employeePhotoType['id'],
                                    'image_id': null,
                                })
                                this.form.errors['employee_photos'].push([])
                            }
                        })
                        this.resources['address_types'].forEach(addressType => {
                            let employeeAddress = lodash.find(this.form.data['employee_addresses'], (e) => e['address_type_id'] == addressType['id'])
                            if (employeeAddress == undefined) {
                                this.form.data['employee_addresses'].push({
                                    'address_type_id': addressType['id'],
                                    'image_id': null,
                                })
                                this.form.errors['employee_addresses'].push([])
                            }
                        })
                        this.resources['contact_types'].forEach(contactType => {
                            let employeeContact = lodash.find(this.form.data['employee_contacts'], (e) => e['contact_type_id'] == contactType['id'])
                            if (employeeContact == undefined) {
                                this.form.data['employee_contacts'].push({
                                    'contact_type_id': contactType['id'],
                                    'image_id': null,
                                })
                                this.form.errors['employee_contacts'].push([])
                            }
                        })
                    })
            })
    },
}