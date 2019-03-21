<?php

namespace Clubhouse\Admin;

use Clubhouse\Model;
use SilverStripe\Admin\ModelAdmin;

class ClubhouseAdmin extends ModelAdmin
{

    private static $url_segment = "clubhouse";

    private static $menu_title = "Clubhouse";

    private static $managed_models = [
        Model\Clubhouse::class
    ];
}
