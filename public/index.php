<?php

/**
 * Main index.
 *
 * @author      Mike Welsh
 * @copyright   2025 Mike Welsh
 * @version     0.0.1
 *
 * Copyright 2025 Mike Welsh
 */

use DumbDog\DumbDog;
use DumbDog\Exceptions\Exception;

try {
    $engine = null;
    $libs = [];
    new DumbDog("../.dumbdog.json", $engine, $libs);
} catch (\Exception $err) {
    (new Exception($err->getMessage()))->fatal();
}