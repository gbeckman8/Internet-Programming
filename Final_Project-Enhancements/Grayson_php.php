<?php
echo $_SERVER['HTTP_USER_AGENT'];
$browser = get_browser();
print_r("You are using" + $browser);
?> 