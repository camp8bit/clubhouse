<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;

class ClubhouseMember extends DataObject
{
    private static $table_name = "ClubhouseMember";

    private static $db = [
        "AccessLevel" => "Enum('Member,Admin', 'Member')",
    ];

    private static $has_one = [
        "Clubhouse" => Clubhouse::class,
        "Member" => Member::class,
    ];

    public function getTitle()
    {
        return $this->Subdomain;
    }
}
