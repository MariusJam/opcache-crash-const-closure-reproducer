<?php
// reproducer/preload.php

// Simulate Symfony preloading
opcache_compile_file(__DIR__ . '/BuggyClass.php');
