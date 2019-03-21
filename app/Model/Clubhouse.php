<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms as F;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldDetailForm;

class Clubhouse extends DataObject
{

    private static $table_name = "Clubhouse";

    private static $db = [
        "Subdomain" => "Varchar",
        "Title" => "Varchar",
    ];

    private static $summary_fields = [
        "Title",
        "Subdomain",
    ];

    private static $many_many = [
        "Members" => [
            "through" => ClubhouseMember::class,
            "from" => "Clubhouse",
            "to" => "Member",
        ]
    ];

    private static $has_many = [
        "Posts" => Post::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $memberList = $fields->dataFieldByName('Members');
        $memberList->getConfig()->getComponentByType(GridFieldDataColumns::class)->setDisplayFields([
            'FirstName' => 'First Name',
            'Surname' => 'Surname',
            'Email' => 'Email',
            'ClubhouseMember.AccessLevel' => 'Access Level',
        ]);

        $memberList->getConfig()->getComponentByType(GridFieldDetailForm::class)->setFields($this->getMemberFields());

        $fields->fieldByName('Root')->removeByName('Members');
        $fields->addFieldToTab('Root.Main', $memberList);

        $fields->fieldByName('Root')->removeByName('Members');
        $fields->addFieldToTab('Root.Main', $memberList);

        $postList = $fields->dataFieldByName('Posts');
        $postList->getConfig()->removeComponentsByType(GridFieldAddExistingAutocompleter::class);

        return $fields;
    }

    /**
     * Return the fields for the member form within the clubhouse admin
     */
    private function getMemberFields()
    {
        return new F\FieldList(
            new F\Tabset(
                'Root',
                new F\Tab(
                    'Main',
                    new F\TextField('FirstName', 'First name'),
                    new F\TextField('Surname'),
                    new F\TextField('Email'),
                    new F\ReadonlyField('ClubhouseMember.AccessLevel', 'Access level', '(work in progress)')
                )
            )
        );
    }
}
