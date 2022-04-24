<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\modules\users\widgets;

use usni\UsniAdaptor;
use usni\fontawesome\FA;
use usni\library\utils\ArrayUtil;
/**
 * Render action toolbar on top of users detail view.
 *
 * @package usni\library\widgets
 * 
 * @package usni\library\modules\users\widgets
 */
class DetailActionToolbar extends \usni\library\widgets\DetailActionToolbar
{
    /**
     * Change password url for the model
     * @var string 
     */
    public $changePasswordUrl; 

    /**
     * Approved email url for the model
     * @var string
     */
    public $approvedEmailUrl;
    
    /**
     * @inheritdoc
     */
    public function getListItems()
    {
        $items[]    = ['label' => FA::icon('lock') . "\n" . UsniAdaptor::t('application', 'Change Password'), 
                       'url' => $this->changePasswordUrl];
        $items[]    = ['label' => FA::icon('envelope') . "\n" . UsniAdaptor::t('application', 'Send Approved Email'),
                      'url' => $this->approvedEmailUrl];
        return ArrayUtil::merge(parent::getListItems(), $items);
    }
}
