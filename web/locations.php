<?php
$redis = new Redis();
$redis->connect('localhost', 6379);


$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : "get";
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$lon = isset($_GET['lon']) ? $_GET['lon'] : null;
$name = isset($_GET['name']) ? $_GET['name'] : null;
$time = time();

$cmds = array(
    "get",
    "set",
);

if ( in_array ( $cmd, $cmds ) ) {
    switch ($cmd) {
        case "get":
            $els = $redis->lRange('locations', 0, -1);
            $fEls = array();
            foreach($els as $el) 
            {
                $fEls[] = json_decode($el);     
            }
            print json_encode($fEls);
            break;
        case "set":
            if ( $lat != null && $lon != null ) {
                $obj = new stdClass();
                $obj->lat = $lat;
                $obj->lon = $lon;
                $obj->time = $time;
                $obj->name = $name;
                $objJson = json_encode($obj);
                $redis->lPush("locations", $objJson);
                $success = new stdClass();
                $success->message = "success!";
                print json_encode($success);
            } else {
                throw new Exception('Command "set" requires both "lat" and "lon"');
            }
            break;
    }    
} else {
    throw new Exception('Command specified does not exist');
}


?>

