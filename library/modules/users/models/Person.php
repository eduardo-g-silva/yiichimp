<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\modules\users\models;

use usni\library\db\ActiveRecord;
use usni\library\utils\FileUploadUtil;
use usni\UsniAdaptor;
use usni\library\validators\EmailValidator;
use usni\library\validators\FileSizeValidator;
use usni\library\utils\ArrayUtil;
/**
 * This is the model class for table "person. The followings are the available model relations.
 *
 * @package usni\library\modules\users\models
 */
class Person extends ActiveRecord
{
    /**
     * Upload File Instance.
     * @var string
     */
    public $savedImage;

    /**
     * Upload File Instance.
     * @var string
     */
    public $uploadInstance;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        if($this->checkIfExtendedConfigExists())
        {
            $configInstance = $this->getExtendedConfigClassInstance();
            $labels         = $configInstance->attributeLabels();
        }
        else
        {
            $labels = [
                        'id'                => UsniAdaptor::t('application', 'Id'),
                        'dancing_role'      => UsniAdaptor::t('users','Dancing Role'),
                        'registration_type' => UsniAdaptor::t('users','Category you compete'),
                        'firstname'         => UsniAdaptor::t('users','Your First Name'),
                        'lastname'          => UsniAdaptor::t('users','Your Last Name'),
                        'city'              => UsniAdaptor::t('users','City where you live'),
                        'nationality'       => UsniAdaptor::t('users','Nationality'),
                        'facebook'          => UsniAdaptor::t('users','Facebook or Instagram Profile'),
                        'partner_role'      => UsniAdaptor::t('users','Partner Role'),
                        'partner_firstname' => UsniAdaptor::t('users','Partner First Name'),
                        'partner_lastname'  => UsniAdaptor::t('users','Partner Last Name'),
                        'partner_email'  => UsniAdaptor::t('users','Partner email'),
                        'partner_nationality' => UsniAdaptor::t('users','Partner Nationality'),
                        'partner_city' => UsniAdaptor::t('users','Partner city where lives'),
                        'partner_facebook' => UsniAdaptor::t('users','Partner Facebook or Instagram Profile'),
                        'mobilephone'       => UsniAdaptor::t('users','Mobile'),
                        'email'             => UsniAdaptor::t('users','Email'),
                        'fullName'          => UsniAdaptor::t('users','Full Name'),
                        'profile_image'     => UsniAdaptor::t('users','Profile Image'),
                        'comments'         => UsniAdaptor::t('users','If you share a room please provide name'),
                      ];
        }
        return parent::getTranslatedAttributeLabels($labels);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        if($this->checkIfExtendedConfigExists())
        {
            $configInstance = $this->getExtendedConfigClassInstance();
            $scenarios      = $configInstance->scenarios();
            return $scenarios;
        }
        else
        {
            $scenarios                  = parent::scenarios();
            $commonAttributes           = ['registration_type','firstname','lastname','mobilephone','email','nationality','city','facebook','avatar','profile_image','created_by','modified_by','created_datetime','modified_datetime','dancing_role','partner_role','partner_firstname','partner_lastname','partner_email','partner_nationality','partner_city','partner_facebook','comments'];
            $scenarios['create']        = $scenarios['update'] = ArrayUtil::merge($commonAttributes, ['profile_image']);
            $scenarios['registration']  = $scenarios['editprofile'] = ['registration_type','firstname','lastname','mobilephone','email','nationality','city','facebook','avatar','profile_image','created_by','modified_by','created_datetime','modified_datetime','dancing_role','partner_role','partner_firstname','partner_lastname','partner_email','partner_nationality','partner_city','partner_facebook','comments'];
            $scenarios['supercreate']   = $commonAttributes;
            $scenarios['bulkedit']      = ['firstname', 'lastname', 'dancing_role', 'partner_firstname','partner_role', 'partner_lastname', 'mobilephone'];
            $scenarios['deleteimage']   = ['profile_image'];
            return $scenarios;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        if($this->checkIfExtendedConfigExists())
        {
            $configInstance = $this->getExtendedConfigClassInstance();
            $rules          = $configInstance->rules();
            return $rules;
        }
        else
        {
            return array(
                //Person rules
                [['firstname', 'lastname'],         'required'],
                [['firstname', 'lastname'],         'string', 'max' => 32],
                ['email',                           'required'],
                ['email',                           'unique', 'targetClass' => Person::className(), 'on' => ['create', 'registration']],
                ['email',                           'unique', 'targetClass' => Person::className(), 'on' => ['update', 'editprofile'],
                                                    'filter' => ['!=', 'id', $this->id]],
                ['email',                           EmailValidator::className()],
                [['registration_type'],             'string'],
                ['registration_type', 'required', 'when' => function($model) {
                    return $model->registration_type != 'N/A';
                }],
                [['nationality'],                  'string'],
                ['nationality', 'required', 'when' => function($model) {
                    return $model->registration_type != 'N/A';
                }],
                [['city'],                  'string'],
                ['city', 'required', 'when' => function($model) {
                    return $model->registration_type != 'N/A';
                }],
                [['dancing_role'],                  'required'],
                [['dancing_role'],                  'string'],
                [['partner_role'],                  'string'],
                [['partner_firstname'],               'required'],
                [['partner_firstname'],               'string'],
                [['partner_lastname'],               'required'],
                [['partner_lastname'],               'string'],
                [['partner_email'],               'required'],
                [['partner_email'],               'string'],
                [['partner_city'],               'string'],
                ['partner_city', 'required', 'when' => function($model) {
                    return $model->registration_type != 'N/A';
                }],
                [['partner_nationality'],               'string'],
                ['partner_nationality', 'required', 'when' => function($model) {
                    return $model->registration_type != 'N/A';
                }],
                [['facebook'],               'string'],
                [['facebook'], 'required'],
                [['mobilephone'],                   'number'],
                [['profile_image'],                 'file'],
                ['profile_image',                   FileSizeValidator::className()],
                [['profile_image', 'uploadInstance'],       'image', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, gif, jpeg'],
                [['firstname', 'lastname', 'mobilephone', 'dancing_role', 'partner_role', 'comments'],  'safe'],
            );
        }
    }

    /**
     * Gets profile image.
     * @param array $htmlOptions
     * @return mixed
     */
    public function getProfileImage($htmlOptions = array())
    {
        return FileUploadUtil::getThumbnailImage($this, 'profile_image', $htmlOptions);
    }

    /**
     * Get address for the person.
     * @return \Address
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['relatedmodel_id' => 'id'])
                    ->where('relatedmodel = :rm AND type = :type', [':rm' => 'Person', ':type' => Address::TYPE_DEFAULT]);
    }

    /**
     * @inheritdoc
     */
    public static function getLabel($n = 1)
    {
        return UsniAdaptor::t('users', 'Person');
    }

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        if(parent::beforeDelete())
        {
            if($this->profile_image != null)
            {
                //Delete image if exist
                $config = [
                            'model'             => $this,
                            'attribute'         => 'profile_image',
                            'uploadInstance'    => null,
                            'savedFile'         => null,
                            'createThumbnail'   => true
                          ];
                $fileManagerInstance = UsniAdaptor::app()->assetManager->getResourceManager('image', $config);
                $fileManagerInstance->delete();
            }
            return true;
        }
        return false;
    }

    /**
     * Get full name for the user.
     * @return string
     */
    public function getFullName()
    {
        if($this->firstname != null && $this->lastname != null)
        {
            return $this->firstname . ' ' . $this->lastname;
        }
        else
        {
            return UsniAdaptor::t('application', '(not set)');
        }
    }
}