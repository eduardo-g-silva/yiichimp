<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\widgets;

use usni\library\db\ActiveRecord;
use usni\library\bootstrap\Label;
use usni\library\utils\Html;
use usni\library\utils\CustomerTypeUtil;
use usni\UsniAdaptor;
/**
 * Label for the customer type
 *
 * @package usni\library\widgets
 */
class CustomerTypeLabel extends \yii\bootstrap\Widget
{
    /**
     * @var ActiveRecord|array 
     */
    public $model;
    
    /**
     * inheritdoc
     */
    public function run()
    {
        $id     = $this->model['id'] . '-type';
        $value  = $this->getLabel();
        if ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_VOLUNTEER)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_DEFAULT, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_CONCESSION)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_WORKSHOP)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_INFO, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_LEADER)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_PRIMARY, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_FOLLOWER)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_INFO, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_COUPLE)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_SUCCESS, 'id' => $id]);
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_COMPETITOR)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_WARNING, 'id' => $id]);
        }
    }
    
    /**
     * Gets label for the customer type.
     * @return string
     */
    public function getLabel()
    {
        if ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_VOLUNTEER)
        {
            return UsniAdaptor::t('application', 'Volunteer');
        }
        elseif($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_CONCESSION)
        {
            return UsniAdaptor::t('application', 'Concession');
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_WORKSHOP)
        {
            return UsniAdaptor::t('application', 'Workshop');
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_LEADER)
        {
            return UsniAdaptor::t('application', 'Leader');
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_FOLLOWER)
        {
            return UsniAdaptor::t('application', 'Follower');
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_COUPLE)
        {
            return UsniAdaptor::t('application', 'Couple');
        }
        elseif ($this->model['type'] == CustomerTypeUtil::CUSTOMER_TYPE_COMPETITOR)
        {
            return UsniAdaptor::t('application', 'Competitor');
        }
    }
}