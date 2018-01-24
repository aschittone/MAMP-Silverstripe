<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class TaskPage extends Page
{
    private static $db = [];

    private static $has_one = [];

    private static $has_many = [];

    public function getCMSFields() 
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function Users()
    {
        return TaskUser::get();
    }

}