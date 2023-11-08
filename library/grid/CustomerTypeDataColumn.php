<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\grid;

use yii\grid\DataColumn;
use usni\library\widgets\CustomerTypeLabel;

/**
 * CustomerTypeDataColumn class file.
 * 
 * @package usni\library\grid
 */
class CustomerTypeDataColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        return CustomerTypeLabel::widget(['model' => $model]);
    }
}