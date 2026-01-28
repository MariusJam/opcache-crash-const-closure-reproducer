<?php
// reproducer/index.php

require_once __DIR__ . '/BuggyClass.php';

echo "Accessing constant...\n";

// This access should not trigger the SIGSEGV if the class was preloaded
$const = \App\BuggyClass::TEST_CONST_STRING;
echo "Success: " . $const . "\n";

// This access should trigger the SIGSEGV if the class was preloaded
echo "Next should crash \n";
$const = \App\BuggyClass::TEST_CONST;
echo "Success: " . ($const)() . "\n";
