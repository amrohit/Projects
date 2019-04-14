<?php
define('WEEK_FILE', '../data/members/weekDate.txt');

if (isset($_POST['collData']) && isset($_POST['user'])) {
    $collectedData = $_POST['collData'];
    if (isset($_POST['weekEnd'])) {
        $weekEnd = $_POST['weekEnd'];
    }
    if (isset($_POST['leaveDet'])) {
        $leaveDet = $_POST['leaveDet'];
    }
    $user = trim($_POST['user']);

   // file_put_contents(WEEK_FILE,  . PHP_EOL, FILE_APPEND);
    $fileData = readFiles();
    $uiData = computeDate($collectedData, $user, $leaveDet, $weekEnd);
    $finalData = array_merge($fileData,$uiData);
    file_put_contents(WEEK_FILE, trim(implode("\n",$finalData),"\n"));
    echo 'Done';
} elseif(isset($_POST['display'])) {
    echo json_encode(readFiles());
} elseif(isset($_POST['uiData'])) {
    echo json_encode(readFiles());
} elseif(isset($_POST['c'])) {
    file_put_contents(WEEK_FILE, "");
    echo 1;
} elseif(isset($_POST['folder'])) {
    delFolderFiles();
    echo 1;
}
function computeDate($arrWeek, $user, $leave, $weekend)
{
    $tempArr = array();
    $fmt = "$user@";
    foreach ($arrWeek as $k => $v) {
        $k = date('m/d/Y', strtotime($k));

        //$k = date('d-M-y', strtotime($k));
        $fmt .= "$k>$v|";
    }
    $fmt = rtrim($fmt, "|");
    $fmt .= "#" . $leave . '*' . $weekend;
    $fmt = trim(rtrim($fmt, "*"));
    $tempArr[$user] = $fmt;
    return $tempArr;
}
function readFiles()
{   $file = file(WEEK_FILE);
    $tempList = array();
    foreach ($file as $val) {
        $valExplode = explode("@", $val);
        // $tempList[$valExplode[0]] = $valExplode[1];
        $tempList[$valExplode[0]] = trim($val);
    }
    return $tempList;
}

function delFolderFiles() {
$vars = glob(".././data/screenshots/*/*.*");
foreach($vars as $v) {
    unlink($v);
}
}