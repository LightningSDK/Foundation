<?php

namespace Modules\Foundation6\View;

use Lightning\View\JS;

class Foundation6 {
    public static function init() {
        JS::startup("$(document).foundation()", ['Foundation6' => 'vendor/zurb/foundation/dist/js/foundation.min.js']);
    }
}
