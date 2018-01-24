<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\DropdownField;

class Task extends DataObject 
{
    private static $db = [
        'Title' => 'Varchar(200)'
    ];

    private static $has_one = [
        'TaskUser' => TaskUser::class
    ];

    private static $summary_fields = [
        'Title' => 'Task',
        'TaskUser.Name' => 'User',
        'Created.Nice' => 'Created'
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title')
        );

        $user = DropdownField::create('TaskUserID', 'User', TaskUser::get()->map('ID', 'Name'))->setEmptyString('(Assign Task)'); 
        $fields->push($user);

        return $fields;
    }

}