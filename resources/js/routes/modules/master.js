import unit from './master/unit'
import productionType from './master/production-type'
import operationalPhotoType from './master/operational-photo-type'
import operationalPhotoPenaltyType from './master/operational-photo-penalty-type'
import minimumOperationalPhoto from './master/minimum-operational-photo'
import qualityControlType from './master/quality-control-type'
import disciplinaryParameter from './master/disciplinary-parameter'
import generalCleaningActivity from './master/general-cleaning-activity'
import marketingActivity from './master/marketing-activity'
import marketingItem from './master/marketing-item'

export default [
    ...unit,
    ...productionType,
    ...operationalPhotoType,
    ...operationalPhotoPenaltyType,
    ...minimumOperationalPhoto,
    ...qualityControlType,
    ...disciplinaryParameter,
    ...generalCleaningActivity,
    ...marketingActivity,
    ...marketingItem,
];
