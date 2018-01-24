<?php

use SilverStripe\Admin\ModelAdmin;

class TaskAdmin extends ModelAdmin
{

    private static $menu_title = 'Tasks';

    private static $url_segment = 'tasks';

    private static $managed_models = [
        Task::class,
        TaskUser::class
    ];
}