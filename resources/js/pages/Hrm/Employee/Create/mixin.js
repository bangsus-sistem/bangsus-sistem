import commonMixin from '../common/mixin'

export default {
    mixins: [commonMixin],
    created() {
        this.fetchAndSetMultipleResources({
            'blood_types': '/ajax/hrm/blood_type/all',
            'genders': '/ajax/hrm/gender/all',
            'branches': '/ajax/system/branch/all',
            'job_titles': '/ajax/hrm/job_title/all',
            'address_types': '/ajax/hrm/address_type/all',
            'contact_types': '/ajax/hrm/contact_type/all',
            'employee_photo_types': '/ajax/hrm/employee_photo_type/all',
        }, { resolve: true, reject: false })
            .then(res => {
                this.resources['employee_photo_types'].forEach(employeePhotoType => {
                    this.form.data['employee_photos'].push({
                        'employee_photo_type_id': employeePhotoType['id'],
                        'image_id': null,
                    })
                    this.form.errors['employee_photos'].push([])
                })
                this.resources['address_types'].forEach(addressType => {
                    this.form.data['employee_addresses'].push({
                        'address_type_id': addressType['id'],
                        'address': '',
                    })
                    this.form.errors['employee_addresses'].push([])
                })
                this.resources['contact_types'].forEach(contactType => {
                    this.form.data['employee_contacts'].push({
                        'contact_type_id': contactType['id'],
                        'contact': '',
                    })
                    this.form.errors['employee_contacts'].push([])
                })
            })
    },
}