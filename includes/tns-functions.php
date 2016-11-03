<?php
/***************************************************************************************************
**  Various helper functions for the website
**
**
**
****************************************************************************************************/

/*  get the IP address of the client connecting to the site  */
function get_ip_address() {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    echo $ip;
                }
            }
        }
    }
}

function getip() {
    print "IP = ".$_SERVER["REMOTE_ADDR"];
}





?>
