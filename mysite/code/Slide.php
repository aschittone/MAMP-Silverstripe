<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Slide extends DataObject 
{
    private static $db = [
        'Title' => 'Varchar(200)'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'HomePage' => HomePage::class
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title'),
            $uploader = UploadField::create('Image')
        );

        $uploader->setFolderName('Slides');
        $uploader->getValidator()->setAllowedExtensions(['png','gif','jpeg','jpg']);

        return $fields;
    }

}