<?php

namespace lightningsdk\foundation\View;

use lightningsdk\core\View\JS;

class Foundation {
    public static function init() {
        JS::startup("lightning.foundation.init();", ['lightningsdk/foundation' => 'vendor/zurb/foundation/dist/js/foundation.min.js', 'document']);
    }
}
