<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class TaskUser extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(200)'
    ];

    private static $has_one = [];

    private static $has_many = [
    	'Tasks' => Task::class
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Name')
        );

        return $fields;
    }

    public function getTitle()
    {
    	return $this->Name;
    }

}
