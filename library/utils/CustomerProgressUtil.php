<?php
namespace usni\library\utils;

use usni\UsniAdaptor;

/**
 * CustomerProgressUtil class file.
 * 
 * @package usni\library\utils
 */
class CustomerProgressUtil
{
    const CUSTOMER_PROGRESS_WAITING = 0;
    const CUSTOMER_PROGRESS_APPROVED = 1;
    const CUSTOMER_PROGRESS_REJECTED = 2;
    const CUSTOMER_PROGRESS_PAID = 3;

    /**
     * Gets customer progress dropdown.
     * @return array
     */
    public static function getProgressDropdown()
    {
        return array(
            self::CUSTOMER_PROGRESS_WAITING     => UsniAdaptor::t('application','Waiting'),
            self::CUSTOMER_PROGRESS_APPROVED     => UsniAdaptor::t('application','Approved'),
            self::CUSTOMER_PROGRESS_REJECTED     => UsniAdaptor::t('application','Rejected'),
            self::CUSTOMER_PROGRESS_PAID     => UsniAdaptor::t('application','Paid'),
        );
    }
}