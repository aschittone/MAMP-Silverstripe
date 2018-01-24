<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class HomePage extends Page
{
    private static $db = [];

    private static $has_one = [];

    private static $has_many = [
        'Slides' => Slide::class
    ];

    public function getCMSFields() 
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Slides', GridField::create(
            'Slides',
            'Slides',
            $this->Slides(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }

}
