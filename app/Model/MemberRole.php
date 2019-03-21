<?php

namespace Clubhouse\Model;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Member;

class MemberRole extends DataExtension
{

    public function updateCMSFields($fields)
    {
        $fields->removeByName('Locale');
        $fields->removeByName('FailedLoginCount');
        $fields->removeByName('Password');
    }

}
