<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\modules\notification\dto;

/**
 * Data transfer object for notification template.
 *
 * @package usni\library\modules\notification\dto
 */
class TemplateFormDTO extends \usni\library\dto\FormDTO
{
    /**
     * Layout options
     * @var array 
     */
    private $_layoutOptions;
    
    public function getLayoutOptions()
    {
        return $this->_layoutOptions;
    }

    public function setLayoutOptions($layoutOptions)
    {
        $this->_layoutOptions = $layoutOptions;
    }
}
