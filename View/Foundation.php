<?php

namespace lightningsdk\foundation\View;

use Lightning\View\JS;

class Foundation {
    public static function init() {
        JS::startup("$(document).foundation()", ['lightningsdk\foundation' => 'vendor/zurb/foundation/dist/js/foundation.min.js']);
    }
}
