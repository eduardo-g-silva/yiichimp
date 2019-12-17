<?php
namespace usni\library\utils;

use usni\UsniAdaptor;

/**
 * CustomerTypeUtil class file.
 * 
 * @package usni\library\utils
 */
class CustomerTypeUtil
{
    const CUSTOMER_TYPE_VOLUNTEER = 0;
    const CUSTOMER_TYPE_CONCESSION = 1;
    const CUSTOMER_TYPE_WORKSHOP = 2;
    const CUSTOMER_TYPE_FESTIVAL_LEADER = 3;
    const CUSTOMER_TYPE_FESTIVAL_FOLLOWER = 4;
    const CUSTOMER_TYPE_FESTIVAL_COUPLE = 5;
    const CUSTOMER_TYPE_COMPETITOR = 6;

    /**
     * Gets customer type dropdown.
     * @return array
     */
    public static function getDropdown()
    {
        return array(
            self::CUSTOMER_TYPE_VOLUNTEER     => UsniAdaptor::t('application','Volunteer'),
            self::CUSTOMER_TYPE_CONCESSION     => UsniAdaptor::t('application','Concession'),
            self::CUSTOMER_TYPE_WORKSHOP     => UsniAdaptor::t('application','Workshop'),
            self::CUSTOMER_TYPE_FESTIVAL_LEADER   => UsniAdaptor::t('application','Leader'),
            self::CUSTOMER_TYPE_FESTIVAL_FOLLOWER   => UsniAdaptor::t('application','Follower'),
            self::CUSTOMER_TYPE_FESTIVAL_COUPLE     => UsniAdaptor::t('application','Couple'),
            self::CUSTOMER_TYPE_COMPETITOR   => UsniAdaptor::t('application','Competitor')
        );
    }
}