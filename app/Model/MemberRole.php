<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Member;
use SilverStripe\Forms\FieldList;

class MemberRole extends DataExtension
{

    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName('Locale');
        $fields->removeByName('FailedLoginCount');
        $fields->removeByName('Password');
    }

}
