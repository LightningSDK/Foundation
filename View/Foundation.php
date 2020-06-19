<?php

namespace lightningsdk\foundation\View;

use lightningsdk\core\View\JS;

class Foundation {
    public static function init() {
        // TODO: delete window.default is a hack because for some reason it is set by foundation.
        JS::startup("$(document).foundation();", ['lightningsdk/foundation' => 'vendor/zurb/foundation/dist/js/foundation.min.js', 'document']);
    }
}
