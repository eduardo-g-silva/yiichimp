<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/eduardo-g-silva/yiichimp/blob/master/LICENSE.md
 */
namespace usni\library\web;

use usni\UsniAdaptor;
use usni\library\utils\FileUtil;
/**
 * VideoManager class file
 * 
 * @package usni\library\web
 */
class VideoManager extends BaseFileManager
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        if($this->uploadPath == null)
        {
            $this->uploadPath = UsniAdaptor::app()->getAssetManager()->videoUploadPath;
        }
    }
    
    /**
     * @inheritdoc
     */
    public static function getType()
    {
        return 'video';
    }
    
    /**
     * @inheritdoc
     */
    public function delete()
    {
        $path       = $this->uploadPath;
        $fileName   = $this->model->{$this->attribute};
        $filePath   = FileUtil::normalizePath($path . DS . $fileName);
        if(file_exists($filePath) && is_file($filePath))
        {
            unlink($filePath);
        }
    }
}