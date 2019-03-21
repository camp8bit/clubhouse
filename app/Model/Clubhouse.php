<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataObject;

class Clubhouse extends DataObject
{
    private static $table_name = "Clubhouse";

    private static $db = [
        "Subdomain" => "Varchar",
    ];

    private static $summary_fields = [
        "ID",
        "Subdomain",
    ];

    private static $many_many = [
        "Members" => [
            "through" => ClubhouseMember::class,
            "from" => "Clubhouse",
            "to" => "Member",
        ]
    ];
    public function getTitle()
    {
        return $this->Subdomain;
    }
}
