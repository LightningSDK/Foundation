<?php

namespace macdabby\lightning_foundation\View;

use Lightning\View\JS;

class Foundation {
    public static function init() {
        JS::startup("$(document).foundation()", ['macdabby/lightning-foundation' => 'vendor/zurb/foundation/dist/js/foundation.min.js']);
    }
}
