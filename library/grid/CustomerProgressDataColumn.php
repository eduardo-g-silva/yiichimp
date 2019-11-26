<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\grid;

use yii\grid\DataColumn;
use usni\library\widgets\ProgressLabel;

/**
 * ProgressDataColumn class file.
 * 
 * @package usni\library\grid
 */
class CustomerProgressDataColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        return ProgressLabel::widget(['model' => $model]);
    }
}