<?php
namespace usni\library\widgets;

use usni\library\db\ActiveRecord;
use usni\library\bootstrap\Label;
use usni\library\utils\Html;
use usni\library\utils\CustomerProgressUtil;
use usni\UsniAdaptor;
/**
 * Label for the progress
 *
 * @package usni\library\widgets
 */
class ProgressLabel extends \yii\bootstrap\Widget
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
        $id     = $this->model['id'] . '-progress';
        $value  = $this->getLabel();
        if ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_WAITING)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_WARNING, 'id' => $id]);
        }
        elseif ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_APPROVED)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_WARNING, 'id' => $id]);
        }
        elseif ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_REJECTED)
        {
            return Label::widget(['content' => $value, 'modifier' => Html::COLOR_DANGER, 'id' => $id]);
        }
    }
    
    /**
     * Gets label for the status.
     * @return string
     */
    public function getLabel()
    {
        if ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_WAITING)
        {
            return UsniAdaptor::t('application', 'Waiting');
        }
        elseif ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_APPROVED)
        {
            return UsniAdaptor::t('application', 'Approved');
        }
        elseif ($this->model['progress'] == CustomerProgressUtil::CUSTOMER_PROGRESS_REJECTED)
        {
            return UsniAdaptor::t('application', 'Rejected');
        }
    }
}