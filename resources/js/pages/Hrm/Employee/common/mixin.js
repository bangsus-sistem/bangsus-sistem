import mixins from '../../../../mixins'

export default {
    mixins: [mixins],
    data() {
        return {
            form: {
                data: {
                    'code': '',
                    'nik': '',
                    'full_name': '',
                    'place_of_birth': '',
                    'date_of_birth': '',
                    'blood_type_id': null,
                    'gender_id': null,
                    'first_branch_id': null,
                    'first_job_title_id': null,
                    'start_date': null,
                    'description': '',
                    'note': '',
                    'employee_addresses': [],
                    'employee_contacts': [],
                    'employee_photos': [],

                    'blood_type': {},
                    'gender': {},
                    'first_branch': {},
                    'first_job_title': {},
                },
                errors: {
                    'code': [],
                    'nik': [],
                    'full_name': [],
                    'place_of_birth': [],
                    'date_of_birth': [],
                    'blood_type_id': [],
                    'gender_id': [],
                    'first_branch_id': [],
                    'first_job_title_id': [],
                    'start_date': [],
                    'description': [],
                    'note': [],
                    'employee_addresses': [],
                    'employee_contacts': [],
                    'employee_photos': [],
                },
            },
            state: {
                page: {
                    loading: false,
                    error: false,
                    message: null,
                },
                result: { loading: false },
                form: { loading: false },
            },
            resources: {
                'genders': [],
                'branches': [],
                'job_titles': [],
                'address_types': [],
                'contact_types': [],
                'employee_photo_types': [],
            },
        }
    },
    methods: {
        getFormDataCallback() {
            return (data) => {
                return {
                    'id': data['id'],
                    'code': data['code'],
                    'nik': data['nik'],
                    'full_name': data['full_name'],
                    'place_of_birth': data['place_of_birth'],
                    'date_of_birth': data['date_of_birth'],
                    'blood_type_id': data['blood_type']['id'],
                    'gender_id': data['gender']['id'],
                    'first_branch_id': data['first_branch']['id'],
                    'first_job_title_id': data['first_job_title']['id'],
                    'start_date': data['start_date'],
                    'admitted': data['admitted'],
                    'description': data['description'],
                    'note': data['note'],
                    'employee_addresses': data['employee_addresses'],
                    'employee_contacts': data['employee_contacts'],
                    'employee_photos': data['employee_photos'],

                    'blood_type': data['blood_type'],
                    'gender': data['gender'],
                    'first_branch': data['first_branch'],
                    'first_job_title': data['first_job_title'],
                }
            }
        },
        getEmployeePhotoType(id) {
            return lodash.find(this.resources['employee_photo_types'], (employeePhotoType) => employeePhotoType['id'] == id)
        },
        getEmployeePhotoTypeString(id) {
            let employeePhotoType = this.getEmployeePhotoType(id)
            return employeePhotoType != undefined
                ?  employeePhotoType['code'] + ' - ' + employeePhotoType['name']
                :  ''
        },
        getEmployeePhotoTypeRequired(id) {
            let employeePhotoType = this.getEmployeePhotoType(id)
            return employeePhotoType != undefined
                ?  employeePhotoType['required']
                :  false
        },
        getAddressType(id) {
            return lodash.find(this.resources['address_types'], (addressType) => addressType['id'] == id)
        },
        getAddressTypeString(id) {
            let addressType = this.getAddressType(id)
            return addressType != undefined
                ?  addressType['code'] + ' - ' + addressType['name']
                :  ''
        },
        getAddressTypeRequired(id) {
            let addressType = this.getAddressType(id)
            return addressType != undefined
                ?  addressType['required']
                :  false
        },
        getContactType(id) {
            return lodash.find(this.resources['contact_types'], (contactType) => contactType['id'] == id)
        },
        getContactTypeString(id) {
            let contactType = this.getContactType(id)
            return contactType != undefined
                ?  contactType['code'] + ' - ' + contactType['name']
                :  ''
        },
        getContactTypeRequired(id) {
            let contactType = this.getContactType(id)
            return contactType != undefined
                ?  contactType['required']
                :  false
        },
    },
}