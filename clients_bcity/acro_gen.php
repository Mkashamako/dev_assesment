<?php

$s = $_POST['name'];


$s =strtoupper($s);

if(preg_match_all('/\b(\w)/', $s,$m)) {
    if ( count($m[1]) === 1 )   {
        $v = substr($s,0,3);
    }
    else    {
        $v = implode('',$m[1]);
    }
}
else    {
    $v = '';
}

while ( strlen($v) < 3 )    {
    $v .= chr( ord("A") + rand(0,25) );
}
?>