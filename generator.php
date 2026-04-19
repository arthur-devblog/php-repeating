<?php
declare(strict_types=1);
function generator() {
    for($i = 0; $i < 10; $i++) {
        yield $i;
    }
}
foreach(generator() as $number) {
    echo $number;
}
