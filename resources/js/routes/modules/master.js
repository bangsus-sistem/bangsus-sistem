import unit from './master/unit'
import productionType from './master/production-type'
import operationalPhotoType from './master/operational-photo-type'
// import qualityControlType from './master/quality-control-type'
import generalCleaningActivity from './master/general-cleaning-activity'
import marketingActivity from './master/marketing-activity'
import marketingItem from './master/marketing-item'

export default [
    ...unit,
    ...productionType,
    ...operationalPhotoType,
    ...generalCleaningActivity,
    ...marketingActivity,
    ...marketingItem,
];
