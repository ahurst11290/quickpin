<?php
$redis=new Redis();
$redis->connect('localhost', 6379);


$els = $redis->lRange('locations', 0, -1);
$fEls = array();
foreach($els as $el) {
    $fEls[] = json_decode($el);
}
print json_encode($fEls);
?>
