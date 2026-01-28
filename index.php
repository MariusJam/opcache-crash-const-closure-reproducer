<?php
// reproducer/index.php

require_once __DIR__ . '/BuggyClass.php';

echo "Accessing constant...\n";

// This access should trigger the SIGSEGV if the class was preloaded
$const = \App\BuggyClass::TEST_CONST;
echo "Success: " . ($const)() . "\n";
