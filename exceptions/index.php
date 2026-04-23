<?php
declare(strict_types=1);

function test() {
    throw new Exception;
}

try {
    test();
} catch(Exception $e) {
    var_dump($e->getTrace());
    var_dump($e->getTraceAsString());
}