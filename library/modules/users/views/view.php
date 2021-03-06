<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
use usni\UsniAdaptor;
use usni\library\modules\users\widgets\DetailActionToolbar;
use usni\fontawesome\FA;
use usni\library\widgets\Tabs;
use usni\library\widgets\DetailBrowseDropdown;

/* @var $detailViewDTO \usni\library\modules\users\dto\UserDetailViewDTO */
/* @var $this \usni\library\web\AdminView */

$model          = $detailViewDTO->getModel();
$this->title    = UsniAdaptor::t('application', 'View') . ' ' . UsniAdaptor::t('users', 'User');
$this->params['breadcrumbs'] =  [
                                    [
                                        'label' => UsniAdaptor::t('application', 'Manage') . ' ' .
                                        UsniAdaptor::t('users', 'Users'),
                                        'url' => ['/users/default/index']
                                    ],
                                    [
                                        'label' => UsniAdaptor::t('application', 'View') . ' #' . $model['id']
                                    ]
                                ];

$browseParams   = ['permission' => 'users.viewother',
                   'model' => $model,
                   'data'  => $detailViewDTO->getBrowseModels(),
                   'textAttribute' => 'username',
                   'modalDisplay' => $detailViewDTO->getModalDisplay()];

echo DetailBrowseDropdown::widget($browseParams);
$toolbarParams  = ['editUrl'            => UsniAdaptor::createUrl('users/default/update', ['id' => $model['id']]),
                   'changePasswordUrl'  => UsniAdaptor::createUrl('users/default/change-password', ['id' => $model['id']]),
                   'deleteUrl'          => UsniAdaptor::createUrl('users/default/delete', ['id' => $model['id']])];
?>
<div class="panel panel-default detail-container">
    <div class="panel-heading">
        <h6 class="panel-title"><?php echo FA::icon('book') . $model['username'];?></h6>
            <?php
                echo DetailActionToolbar::widget($toolbarParams);
            ?>
    </div>
    <?php
            $items[] = [
                'options' => ['id' => 'tabloginInfo'],
                'label' => UsniAdaptor::t('application', 'General'),
                'class' => 'active',
                'content' => $this->render('/_userview', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabprofileInfo'],
                'label' => UsniAdaptor::t('users', 'Profile'),
                'content' => $this->render('/_personview', ['detailViewDTO' => $detailViewDTO])
            ];
            $items[] = [
                'options' => ['id' => 'tabaddressInfo'],
                'label' => UsniAdaptor::t('users', 'Address'),
                'content' => $this->render('/_addressview', ['detailViewDTO' => $detailViewDTO])
            ];
            echo Tabs::widget(['items' => $items]);
    ?>
</div>