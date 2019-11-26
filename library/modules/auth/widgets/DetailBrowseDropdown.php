<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\modules\auth\widgets;

/**
 * Renders the browse dropdown.
 *
 * @package usni\library\modules\auth\widgets
 */
class DetailBrowseDropdown extends BrowseDropdown
{
   /**
     * Is detail view in modal display
     * @var boolean 
     */
    public $modalDisplay;
    
    /**
     * inheritdoc
     */
    public function run()
    {
        if($this->modalDisplay == false)
        {
            return parent::run();
        }
        return null;
    }
}
