<?php
date_default_timezone_set('Asia/Shanghai');

ob_start(); phpinfo();
$i = ob_get_contents();
ob_end_clean();

$html = str_replace(
    "module_Zend Optimizer", "module_Zend_Optimizer",
    preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $i)
);
$html = str_replace(' width="600"', '', $html);

$str = <<<STR
<!DOCTYPE html>
<html lang="zh-cn">
<head><meta charset="utf-8">
<style type="text/css">
body,html { margin:0px; padding:0px; }
* { font-family:Consolas !important; }
body { width: 1024px; margin: 40px auto; }
pre {
    margin:0px;
    font-family:monospace;
}
a:link {
    color:#000099;
    text-decoration:none;
    background-color:#ffffff;
}
a:hover {
    text-decoration:underline;
}
table {
    margin-left:auto; width: 100%;
    border-collapse:collapse;
    margin-right:auto;
    text-align:left;
}
th { font-weight: bold; background: #eee; }
td,th {
    border:1px solid #000000;
    font-size:75%;
    vertical-align:baseline;
    font-size:14px;
    padding: 5px;
}
</style>
</head><body>{$html}</body>
</html>
STR;

echo $str;