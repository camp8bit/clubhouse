<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
use SilverStripe\Forms;

class Post extends DataObject
{

    private static $table_name = "Post";

    private static $db = [
        "Subject" => "Varchar(255)",
        "Message" => "Text",
        "Importance" => "Enum('Regular,Announcement', 'Regular')",
    ];

    private static $has_one = [
        "Clubhouse" => Clubhouse::class,
        "Author" => Member::class,
    ];

    private static $summary_fields = [
        "Created",
        "Subject",
        "Message",
        "Author.Name",
    ];

    public function getTitle()
    {
        return $this->Subject;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new Forms\ReadonlyField("Created"), "Subject");

        return $fields;
    }
}
