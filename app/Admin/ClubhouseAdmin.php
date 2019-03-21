<?php

namespace Clubhouse\Admin;

use Clubhouse\Model;
use SilverStripe\Admin\ModelAdmin;

class ClubhouseAdmin extends ModelAdmin
{

    public $showImportForm = false;

    private static $menu_priority = 10;

    private static $url_segment = "clubhouse";

    private static $menu_title = "Clubhouses";

    private static $managed_models = [
        Model\Clubhouse::class
    ];
}
