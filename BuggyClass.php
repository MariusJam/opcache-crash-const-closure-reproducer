<?php
// reproducer/BuggyClass.php

namespace App;

class BuggyClass {
    // Typed constant with a Closure - Causes SIGSEGV during preloading in PHP 8.5 Alpine
    public const \Closure TEST_CONST = static function() {
        return "This will crash";
    };
}
