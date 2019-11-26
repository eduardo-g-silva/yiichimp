<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\dataproviders;

/**
 * ArrayRecordDataProvider is implemented on the same approach as ActiveRecordDataProvider
 * so that we can get array records based on limit and not all models in one go
 * as there in ArrayDataProvider.
 * 
 * @package usni\library\dataproviders
 */
class ArrayRecordDataProvider extends \yii\data\ActiveDataProvider
{
    /**
     * @inheritdoc
     */
    protected function prepareModels()
    {
        if($this->query instanceof \yii\db\ActiveQueryInterface)
        {
            $this->query->asArray();
        }
        return parent::prepareModels();
    }
}