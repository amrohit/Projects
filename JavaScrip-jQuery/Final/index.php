<?php
error_reporting(0);
function readMemFile($pathUrl)
{

    $file = file($pathUrl);
    $tempList = array();
    foreach ($file as $val) {
        $valExplode = explode("-", $val);
        // $tempList[$valExplode[0]] = $valExplode[1];
        $tempList[$valExplode[0]] = array(trim($valExplode[1]), trim($valExplode[2]));

    }
    return $tempList;
}

$MemPathUrl = "./data/members/members.txt";
$storedMems = readMemFile($MemPathUrl);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Clarity
        <?php echo date('d-m-y', strtotime('now')); ?>
    </title>

    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



    <style>
        body {
            /* margin-left: 10px; */
            margin-right: 0px;
            margin-top: 10px;
            font-family: 'Poppins';
        }

        img {
            max-width: 100% !important;
            min-height: 100% !important;
            width: auto !important;
        }

        .fluid-container,
        .row {
            margin-top: 1px;
            width: 100% !important;
        }

        .thumbnail {}

        .tab-div {
            display: none;
        }

        .downbtn {
            position: absolute;
            margin-top: 5%;
            margin-left: 8%;
            webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        #formDates.input.form-control {
            width: 120px !important;
        }

        #weekendLab {
            width: 120px;
        }
    </style>
</head>

<body>
    <div class="fluid-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="nav nav-tabs" id="tabsView">
                            <li role="presentation" class="active" id="home">
                                <a href="#" onclick="showTabView('home')">Home</a>
                            </li>
                            <li role="presentation" id="availData">
                                <a href="#" onclick="showTabView('availData')">Pending Submission</a>
                            </li>
                            <li role="presentation" id="approved">
                                <a href="#" onclick="showTabView('approved')">Approved</a>
                            </li>
                            <li role="presentation" id="conso1">
                                <a href="#" onclick="showTabView('conso1')">Clarity</a>
                            </li>
                            <li role="presentation" id="conso2">
                                <a href="#" onclick="showTabView('conso2')">FieldGlass</a>
                            </li>
                            <li role="presentation" id="hide-nav">
                                <a href="#" onclick="fnHideNav()">Print</a>
                            </li>
                            <li role="presentation" id="clearFile">
                                <a href="#">Clear File</a>
                            </li>
                            <li role="presentation" id="clearFolder">
                                <a href="#">Clear Folders</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Home Tab -->
                <div class="row tab-div" id="home_tab">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <h4 style="color:blue;" id="currentView"></h4>
                            </div>

                            <div class="row widget">
                                <div class="col-xs-12 col-md-12 col-lg-12">



                                    <table class="table table-striped">
                                        <tr id="daysCheck">
                                            <td><label for="checkbox0">Sat</label><input type="checkbox" name="checkbox0"
                                                    id="checkbox0" checked type="checkbox" class="daysCheck"></td>
                                            <td><label for="checkbox1">Sun</label><input type="checkbox" name="checkbox1"
                                                    id="checkbox1" checked type="checkbox" class="daysCheck"></td>
                                            <td><label for="checkbox2">Mon</label><input type="checkbox" name="checkbox2"
                                                    id="checkbox2" class="daysCheck"></td>
                                            <td><label for="checkbox3">Tue</label><input type="checkbox" name="checkbox3"
                                                    id="checkbox3" class="daysCheck"></td>
                                            <td><label for="checkbox4">Wed</label><input type="checkbox" name="checkbox4"
                                                    id="checkbox4" class="daysCheck"></td>
                                            <td><label for="checkbox5">Thu</label><input type="checkbox" name="checkbox5"
                                                    id="checkbox5" class="daysCheck"></td>
                                            <td><label for="checkbox6">Fri</label><input type="checkbox" name="checkbox6"
                                                    id="checkbox6" class="daysCheck"></td>
                                            <td></td>
                                            <td></td>
                                            <td><input type="submit" id="saveTsheet" class="btn btn-info" value="Save"></td>
                                        </tr>
                                        <tr id="formDates">

                                            <td><input class="form-control" id="datepicker7" type="text" disabled></td>
                                            <td><input class="form-control" id="datepicker6" type="text" disabled></td>
                                            <td><input class="form-control" id="datepicker5" type="text" disabled></td>
                                            <td><input class="form-control" id="datepicker4" type="text" disabled></td>
                                            <td><input class="form-control" id="datepicker3" type="text" disabled></td>

                                            <td><input class="form-control" id="datepicker2" type="text" disabled></td>
                                            <td><input class="form-control" id="datepicker1" type="text" disabled></td>
                                            <!-- <td><input class="form-control" id="datepicker2" type="text" disabled
                                            	style="width:100px"></td>
                                            <td><input class="form-control" id="datepicker1" type="text" disabled></td>-->
                                            <td id="Total">Total</td>
                                            <td id="leaveLab">Leave</td>
                                            <td id="weekendLab">Weekend</td>
                                        </tr>

                                        <tr id="formHours">
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day0" type="text" style="width:60px" value="0" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day1" type="text" style="width:60px" value="0" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day2" type="text" style="width:60px" value="9" autofocus
                                                    autocomplete="off">
                                            </td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day3" type="text" style="width:60px" value="9" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day4" type="text" style="width:60px" value="9" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day5" type="text" style="width:60px" value="9" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" onblur="findTotal()" name="hour"
                                                    id="day6" type="text" style="width:60px" value="9" autocomplete="off"></td>
                                            <td><input class="form-control day-hours" name="total_hours" id="total_hours"
                                                    type="text" style="width:70px" autocomplete="off"></td>
                                            <td><input class="form-control" id="leave_i" type="text" style="width:80px"
                                                    autocomplete="off"></td>
                                            <td><input class="form-control" id="Weekend_i" type="text" style="width:75px"
                                                    autocomplete="off"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <a href="#" class="thumbnail">
                                        <img id="view1" src="" alt="..."></a>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <a href="#" class="thumbnail">
                                        <img id="view2" src="" alt="..."></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <?php $dirs = array_filter(glob('./data/screenshots/*'), 'is_dir');?>
                        <h4>Total Users #
                            <?php echo count($dirs); ?>
                        </h4>
                        <ul class="list-group" id="dirList">
                            <?php
foreach ($dirs as $filename) {
    //  echo "$filename size " . filesize($filename) . "\n";
    $filename = trim($filename, "./data/screenshots/");
    // $matching = glob("./data/screenshots/$filename/1" . ".*");
    // $info = pathinfo($matching[0]);
    // $ext1 = $info['extension'];
    // $matching = glob("./data/screenshots/$filename/2" . ".*");
    //echo '<pre>';
    // $fileDet = preg_grep('/Thumbs\.db$/', glob("./data/screenshots/$filename/*.*"), REG_GREP_INVERT);
    $fileDet = array_filter(glob("./data/screenshots/$filename/*.*"), function ($ext) {
        return false === strpos($ext, "Thumbs.db");
    });
    if (file_exists(trim($fileDet[0])) && file_exists(trim($fileDet[1]))) {
        $expFile1 = trim(explode("/", $fileDet[0])[4]);
        $expFile2 = trim(explode("/", $fileDet[1])[4]);
        $file1 = $expFile1;
        $file2 = $expFile2;
        if (sizeof(trim($fileDet[0])) > sizeof(trim($fileDet[1]))) {
            $file1 = $file2;
            $file2 = $expFile1;
        }

    }
    // print_r($expFile);
    // $info = pathinfo($matching[0]);
    // $ext2 = $info['extension'];
    ?>
                            <li class="list-group-item">
                                <a href="#" class="emp-id" id="<?php echo $file1 . " | " . $file2; ?>" rel="<?php echo $filename; ?>">

                                    <?php
//$exp = explode(" ", $storedMems[trim($filename)]);
    $exp = explode("-", $storedMems[trim($filename)][0]);
    echo $exp[count($exp) - 2] . " " . $exp[count($exp) - 1];
    ?>
                                </a>
                            </li>

                            <?php $file1 = $file2 = "";}?>
                        </ul>
                    </div>
                </div>



                <!-- Available data tab -->
                <div class="row tab-div" id="availData_tab">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php

$path = realpath('./data/screenshots/');
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
//echo '<pre>';
foreach ($objects as $name => $object) {
    if (is_dir($name) === true) {
        $explode = explode('screenshots\\', $name);
        // print_r($explode);
        if (preg_match('/^[\w-]+$/', $explode[1])) {
            $data[] = strval($explode[1]);
        }
    }
}

?>
                        <div class="downbtn"><button align="left" id="dl" class="btn btn-warning">Download
                            </button></div>
                        <table id="pending_table" class="table table-bordered" style="width:70%; margin:0 auto; float:none; margin-top: 40px;">
                            <thead>
                                <tr>
                                    <th scope="col" width="40">Walmart Id</th>
                                    <th scope="col" width="60">Resource Name</th>
                                    <th scope="col" width="40">Status</th>
                                    <th scope="col" width="50">Mobile No.</th>
                                    <th scope="col" width="50">File_Count</th>
                                    <th scope="col" width="50">Clarity</th>
                                    <th scope="col" width="50">FieldGlass</th>

                                </tr>
                            </thead>

                            <tbody>


                                <?php
foreach ($data as $key => $val) {
    // echo "$val \n";
    $dirs = array_filter(glob("./data/screenshots/$val/*"), function ($ext) {
        return false === strpos($ext, "Thumbs.db");
    });

    //print_r($dirs);
    if (count($dirs) < 2)
//if (  (!file_exists("1.jpg")) and(!file_exists("2.jpg")) )
    {
        ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo trim($val); ?>
                                    </th>
                                    <td>
                                        <?php echo $storedMems[trim($val)][0]; ?>
                                    </td>
                                    <td>
                                        <?php echo $state = count($dirs) == 2 ? 'Submitted' : 'Pending'; ?>
                                    </td>
                                    <td>
                                        <?php echo $storedMems[trim($val)][1]; ?>
                                    </td>
                                    <td>
                                        <?php echo count($dirs); ?>
                                    </td>
                                    <td>
                                        <?php echo basename($dirs[0]); ?>
                                    </td>
                                    <td>
                                        <?php echo basename($dirs[1]); ?>
                                    </td>
                                </tr>
                                <?php }
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- approved data tab -->
                <div class="row tab-div" id="approved_tab">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="approved_data">
                        <div align="center" style="margin-top: 20px;"><button align="left" id="at" class="btn btn-info">Download
                                Data
                            </button></div>
                        <table id="approved_table" class="table table-bordered" style="width:98%; margin:0 auto; float:none; margin-top: 10px;">
                            <thead>
                                <tr id="headDet">
                                    <th scope="col" width="40">Walmart Id</th>
                                    <th scope="col" width="40">Name</th>
                                    <th scope="col" width="60" id="date1"></th>
                                    <th scope="col" width="40" id="date2"></th>
                                    <th scope="col" width="50" id="date3"></th>
                                    <th scope="col" width="50" id="date4"></th>
                                    <th scope="col" width="50" id="date5"></th>
                                    <th scope="col" width="50" id="date6"></th>
                                    <th scope="col" width="50" id="date7"></th>
                                    <th scope="col" width="50" id="tHours">Total Hours</th>
                                    <th scope="col" width="50" id="leave">Leave</th>
                                    <th scope="col" width="50" id="weekend">Weekend</th>
                                    <th scope="col" width="50" id="halfDay">HalfDay</th>
                                </tr>
                            </thead>

                            <tbody id="tbodyData">
                                <tr>
                                    <th scope="row"></th>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"> </td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                    <td class="hours"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>



                <!-- consoliation part 1 -->
                <div class="row tab-div" id="conso1_tab">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1">

                        <?php
$dirs = array_filter(glob('./data/screenshots/*'), 'is_dir');
$x = 1;
foreach ($dirs as $filename) {
    // echo "$filename size " . filesize($filename) . "\n";
    $filename = trim($filename, "./data/screenshots/");
    //getting folder name in filename varible

    $name = trim($storedMems[trim($filename)]);
    $matching = glob("./data/screenshots/$filename/1" . ".*");
    $info = pathinfo($matching[0]);
    $ext = $info['extension'];
    $fileDet = glob("./data/screenshots/$filename/*.*");
    if (file_exists(trim($fileDet[0])) && file_exists(trim($fileDet[1]))) {
        $expFile1 = trim(explode("/", $fileDet[0])[4]);
        $expFile2 = trim(explode("/", $fileDet[1])[4]);
        $file1 = $expFile1;
        $file2 = $expFile2;
        if (sizeof(trim($fileDet[0])) > sizeof(trim($fileDet[1]))) {
            $file1 = $file2;
            $file2 = $expFile1;
        }

    }
    ?>
                        <h4> <b>
                                <?php echo "$x. $filename"; ?>
                            </b>
                            <blockquote>
                                <?php echo $storedMems[trim($filename)][0]; ?>
                            </blockquote>
                            <!-- <?php echo $storedMems[trim($filename)][1]; ?>-->
                        </h4>
                        <a href="#" class="thumbnail" style="border:none;">
                            <img id="view1" src="<?php echo " ./data/screenshots/$filename/$file1?id=" .
                                strtotime('now'); ?>" alt="...">
                        </a>
                        <hr>

                        <?php
$x++;
}
?>


                    </div>
                </div>



                <!-- consolidation part 2 -->
                <div class="row tab-div" id="conso2_tab">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1">

                        <?php
$dirs = array_filter(glob('./data/screenshots/*'), 'is_dir');
$x = 1;
foreach ($dirs as $filename) {
    //  echo "$filename size " . filesize($filename) . "\n";
    $filename = trim($filename, "./data/screenshots/");
    $name = trim($storedMems[trim($filename)]);
    $matching = glob("./data/screenshots/$filename/2" . ".*");
    $info = pathinfo($matching[0]);
    $ext = $info['extension'];
    $fileDet = glob("./data/screenshots/$filename/*.*");
    if (file_exists(trim($fileDet[0])) && file_exists(trim($fileDet[1]))) {
        $expFile1 = trim(explode("/", $fileDet[0])[4]);
        $expFile2 = trim(explode("/", $fileDet[1])[4]);
        $file1 = $expFile1;
        $file2 = $expFile2;
        if (sizeof(trim($fileDet[0])) > sizeof(trim($fileDet[1]))) {
            $file1 = $file2;
            $file2 = $expFile1;
        }

    }
    ?>

                        <h4><b>
                                <?php echo "$x. $filename"; ?>
                            </b>
                            <blockquote>
                                <?php echo $storedMems[trim($filename)][0]; ?>
                            </blockquote>
                            <!-- <?php echo $storedMems[trim($filename)][1]; ?>-->
                        </h4>

                        <a href="#" class="thumbnail" style="border:none;">
                            <img id="view1" src="<?php echo " ./data/screenshots/$filename/$file2?id=" .
                                strtotime('now'); ?>" alt="...">
                        </a>
                        <hr>
                        <?php
$x++;
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./asset/js/table2csv.js"></script>


<script>
    $(document).ready(function (x) {
        $("#home_tab").show();
        x = 0;
        var preUrl = $('#dirList li a').attr('rel').trim();
        var name = $('#dirList li a').html().trim();
        var exts = $('#dirList li a').attr('id').trim();
        var exts = exts.split("|");
        var ext1 = exts[0].trim();
        var ext2 = exts[1].trim();
        displayView(preUrl, name, ext1, ext2);

        $('.emp-id').on('click', function () {
            var id = $(this).attr('rel').trim();
            var idValue = $(this).html().trim();
            var exts = $(this).attr('id').trim();
            var exts = exts.split("|");
            var ext1 = exts[0].trim();
            var ext2 = exts[1].trim();
            displayView(id, idValue, ext1, ext2);
            $('#currentView').html('' + idValue + '').attr('rel', id);
            $(this).css("color", "green");
        });

        function displayView(id, name, ext1, ext2) {
            if (ext1) {
                var baseSrc1 = 'data/screenshots/' + id + '/' + ext1 + '?id=' + Date.now();
            } else {
                var baseSrc1 = 'asset/img/404.JPG?id=' + Date.now();
            }
            if (ext2) {
                var baseSrc2 = 'data/screenshots/' + id + '/' + ext2 + '?id=' + Date.now();
            } else {
                var baseSrc2 = 'asset/img/404.JPG?id=' + Date.now();
            }


            $('#view1').attr('src', baseSrc1);
            $('#view2').attr('src', baseSrc2);
            swapClass(' Save ', 'btn-success btn-warning', 'btn-info');
            elemRef = $('#formHours input[type="text"]');
            $('#currentView').html('' + name).attr('rel', id);
            var dObj = {
                'uiData': 'getContent'
            };
            fetchRemote(dObj,
                function (x) {
                    var txtData = JSON.parse(x);
                    userCont = txtData[id];
                    cboxDays = $('#daysCheck input[type="checkbox"]');
                    if (userCont !== undefined) {
                        if (userCont.split('#')[1].split('*')[0]) {
                            var leave = userCont.split('#')[1].split('*')[0].trim();
                        } else {
                            leave = "";
                        }

                        if (userCont.split('#')[1].split('*')[1]) {
                            var wkeend = userCont.split('#')[1].split('*')[1].trim();
                        } else {
                            var wkeend = "";
                        }
                        var dataHours = userCont.split("@")[1].split('#')[0].split('|');
                        countHrs = 0;
                        $.each(dataHours, function (a, b) {
                            var hoursVal = dataHours[a].split('>')[1].trim();
                            elemRef[a].value = hoursVal;
                            countHrs = countHrs + parseInt(hoursVal);
                        });
                        elemRef[7].value = countHrs;
                        elemRef[8].value = leave;
                        elemRef[9].value = wkeend;
                        decideLab(leave, wkeend);
                        var getDates = $('#formDates input[type="text"]');
                        wkArr = cleanArray(wkeend.split(','));
                        lvArr = cleanArray(leave.split(','));
                        $.each(getDates, function (x, y) {
                            if ($.inArray(y.value, wkArr) !== -1) {
                                cboxDays[x].checked = true;
                                $("#" + cboxDays[x].id).checkboxradio("refresh");
                            } else {
                                if (dataHours[x].split('>')[1].trim() == 0) {
                                    cboxDays[x].checked = true;
                                    $("#" + cboxDays[x].id).checkboxradio("refresh");
                                }
                            }
                            if ($.inArray(y.value, lvArr) !== -1) {
                                cboxDays[x].checked = false;
                                $("#" + cboxDays[x].id).checkboxradio("refresh");
                            } else {
                                if (dataHours[x].split('>')[1].trim() != 0) {
                                    cboxDays[x].checked = false;
                                    $("#" + cboxDays[x].id).checkboxradio("refresh");
                                }
                            }
                        });
                    } else {
                        $('#leaveLab').html('Leave');
                        $('#weekendLab').html('Weekend');
                        displayDef(elemRef, cboxDays);

                    }
                });

        }
        $('.daysCheck').on('change', function () {
            var thisId = $(this).attr('id').split('checkbox')[1].trim();
            if ($(this).attr('checked') !== 'checked') {
                $('#day' + thisId).val(0);
            } else {
                $('#day' + thisId).val(9);
            }

        })

        function displayDef(x, y) {
            $.each(y, function (o, p) {
                if (p.checked) {
                    x[o].value = 0;
                } else {
                    x[o].value = 9;
                }
            });
        }

        function decideLab(leave, wkeend) {
            if (leave.indexOf(',') !== -1 && leave) {
                $('#leaveLab').html('Leave = ' + leave.split(',').length);
            } else if (leave) {
                $('#leaveLab').html('Leave = 1');
            } else {
                $('#leaveLab').html('Leave');
            }
            if (wkeend.indexOf(',') !== -1 && wkeend) {
                $('#weekendLab').html('Weekend = ' + wkeend.split(',').length);
            } else if (wkeend) {

                $('#weekendLab').html('Weekend = 1');
            } else {
                $('#weekendLab').html('Weekend');
            }
        }
        $('#action-approve').on('click', function (e) {
            if ($(this).attr('rel') === "true") {
                $(this).removeClass('btn-success').addClass('btn-default').attr('rel', 'false').html(
                    ' Approve ');
            } else {
                $(this).removeClass('btn-default').addClass('btn-success').attr('rel', 'true').html(
                    ' Approved ');
            }
        });
        $('#clearFile').on('click', function () {
            var o = {
                'c': 'c'
            };
            var conf = confirm('Do you want to clear Text File?')
            if (conf) {
                fetchRemote(o, function (x) {
                    if (x == 1) {
                        alert('File Cleared');
                    }
                });
            } else {

            }

        });
        $('#clearFolder').on('click', function () {
            var o = {
                'folder': 'files'
            };
            var conf = confirm('Do you want to clear Folder File?')
            if (conf) {
                fetchRemote(o, function (x) {
                    if (x == 1) {
                        alert('File Cleared in the folder');
                    }
                });
            } else {

            }
        });

        $('img').on('click', function () {
            $('.nav').fadeIn(500);
        });
        $('#formDates input[type="text"]').each(function () {

            this.value = getCurrentWeekDate(x);
            //formHours

            x++;
        });

        function cleanArray(actual) {
            var newArray = new Array();
            for (var i = 0; i < actual.length; i++) {
                if (actual[i]) {
                    newArray.push(actual[i]);
                }
            }
            return newArray;
        }

        function collectData() {
            collData = {};
            weekEnd = "";
            leaveDet = "";
            i = 0;
            totalHours = 0;
            collHours = $('#formHours input[type="text"]');
            chkBoxsChkd = $('input[type="checkbox"]:checked');
            cboxWeekArr = [];
            chkBoxsChkd.each(function () {
                cboxWeekArr.push(parseInt(this.id.split('checkbox')[1].trim()));
            });
            chkBoxsUnchkd = $("input:checkbox:not(:checked)");
            cboxLeaveArr = [];
            chkBoxsUnchkd.each(function () {
                cboxLeaveArr.push(parseInt(this.id.split('checkbox')[1].trim()));
            });
            $('#formDates input[type="text"]').each(function () {
                dateVal = this.value.trim();
                var hoursVal = parseInt(collHours[i].value.trim());
                collData[dateVal] = hoursVal;
                totalHours = parseInt(totalHours) + parseInt(hoursVal);
                if (($.inArray(i, cboxWeekArr) !== -1) && hoursVal !== 0) {
                    weekEnd = weekEnd + "," + new Date(dateVal).getDate();
                }
                if (($.inArray(i, cboxLeaveArr) !== -1) && hoursVal == 0) {
                    leaveDet = leaveDet + "," + new Date(dateVal).getDate();
                }
                i++;
            });
            weekEnd = weekEnd.charAt(0) === "," ? weekEnd.slice(1) : weekEnd.slice(weekEnd.length);
            leaveDet =
                leaveDet.charAt(0) === "," ? leaveDet.slice(1) : leaveDet.slice(leaveDet.length);
            collHours[
                7].value = totalHours;
            collHours[9].value = weekEnd;
            collHours[8].value = leaveDet;
            var user = $('#currentView').attr('rel').trim();
            var dataObj = {
                'collData': collData,
                'user': user,
                'weekEnd': weekEnd,
                'leaveDet': leaveDet
            };
            decideLab(leaveDet, weekEnd);
            fetchRemote(dataObj, function (x) {
                if (x) {
                    swapClass('Saved', 'btn-info btn-warning', 'btn-success');
                }
            });
        }

        function swapClass(val, remCls, adCls) {
            $('#saveTsheet').val(val).removeClass(remCls).addClass(adCls);
        }
        $('#approved').on('click', function (c) {
            fetchRemote({
                'display': 1
            }, function (x) {
                var appData = JSON.parse(x);
                populateData(appData);
            })

        });
        //collectData();
        $('#saveTsheet').on('click', function () {
            var reqlength = $('.day-hours').length;
            console.log(reqlength);
            var value = $('.day-hours').filter(function () {
                return this.value != '';
            });

            if (value.length >= 0 && (value.length !== reqlength)) {
                alert('Please fill out all required fields.');
            } else {
                collectData();
            }
        });

        function fetchRemote(dataObj, handleData) {
            $.ajax({
                type: "POST",
                url: './api/save.php',
                data: dataObj,
                cache: false,
                success: function (data) {
                    handleData(data);
                },
                error: function (err) {
                    handleData(err);
                }

            })
        }

        function populateData(dataCont) {
            sinKey = [];
            for (var k in dataCont) {
                sinKey.push(k);
                break;
            }
            var dateHours = dataCont[sinKey[0]].split("@")[1].split('#')[0].split('|');
            y = 1, dateArr = [];
            $.each(dateHours, function (k, v) {
                var weekDate = v.split('>')[0].trim();
                $('#date' + y).html(weekDate);
                dateArr[k] = weekDate;
                y++;
            });
            domElem = '';
            z = 0;
            $.each(dataCont, function (k, v) {
                var dateHours = dataCont[k].split("@")[1].split('#')[0].split('|');
                if (v.split('#')[1].split('*')[0]) {
                    var leave = v.split('#')[1].split('*')[0].trim().split(',');
                } else {
                    leave = "";
                }

                if (v.split('#')[1].split('*')[1]) {
                    var wkeend = v.split('#')[1].split('*')[1].trim();
                } else {
                    var wkeend = "";
                }
                tHours = 0;
                halfDay = '';
                $.each(dateHours, function (k, v) {
                    hrs = parseInt(v.split('>')[1].trim());
                    tHours = tHours + hrs;
                    if (hrs <= 5 && hrs > 0) {
                        halfDay = halfDay + new Date(dateArr[k]).getDate() + ',';
                    }
                });
                var halfDay = halfDay.indexOf(',') !== -1 ? (halfDay.indexOf(',') == 0 ? halfDay.slice(
                    1, halfDay.length + 1) : halfDay.slice(0, -1)) : halfDay;
                leave = leave + ',' + halfDay;
                var leave = leave.indexOf(',') !== -1 ? (leave.indexOf(',') == 0 ? leave.slice(1,
                    leave.length + 1) : leave) : leave;
                var memObj = '<?php echo json_encode($storedMems); ?>';
                memObj = memObj.replace(/(\r\n\t|\n|\r\t)/gm, "");
                var memObj = $.parseJSON(memObj);
                domElem = domElem +
                    '<tr><th scope = "row">' + k + '</th><td>' + memObj[k][0].trim() +
                    '</td><td class = "hours" >' + dateHours[0].split(
                        '>')[1].trim() + '<td class = "hours" >' + dateHours[1].split('>')[1].trim() +
                    '</td> <td class = "hours" >' + dateHours[2].split('>')[1].trim() +
                    '</td> <td class = "hours" >' + dateHours[3].split('>')[1].trim() +
                    '</td> <td class = "hours" >' + dateHours[4].split('>')[1].trim() +
                    '</td> <td class = "hours" >' + dateHours[5].split('>')[1].trim() +
                    '</td> <td class = "hours" >' + dateHours[6].split('>')[1].trim() +
                    '</td>' + '<td class = "hours">' + tHours + '</td>' + '<td class = "hours">' +
                    leave + '</td><td class = "hours" >' + wkeend +
                    '</td><td>' + halfDay + '</td></tr>';

                $('#tbodyData').html(domElem);
                z++;
            });
        }

        $('#formHours :input').on('change', function () {
            swapClass('UnSaved', 'btn-primary', 'btn-warning');
        });

    });

    function showTabView(stateId) {
        $('.tab-div').hide();
        $('#tabsView li').removeClass("active");
        $('#' + stateId + '_tab').show()
        $('#' + stateId).addClass("active");
    }

    function fnHideNav() {
        $('.nav').fadeOut(500);
    }

    function getCurrentWeekDate(x) {
        currDate = new Date(new Date());
        var day = currDate.getDay(),
            diff = currDate.getDate() - day + (day == 0 ? -6 : 1);
        var newDate = new Date(currDate.setDate(diff));
        var finalDate = new Date(newDate.setDate(newDate.getDate() - 2));
        //  var finalDate = (finalDate.getDate() + x) + '/' + (finalDate.getMonth() + 1) + '/' + finalDate.getFullYear();
        // Date Format
        var finalDate = (finalDate.getMonth() + 1) + '/' + (finalDate.getDate() + x) + '/' + finalDate.getFullYear();
        return finalDate;
    }

    $("#dl").click(function () {
        $("#pending_table").table2csv('output', {
            appendTo: '#out'
        });
        $("#pending_table").table2csv();
    });
    $("#at").click(function () {
        $("#approved_table").table2csv('output', {
            appendTo: '#out'
        });
        options.filename = 'approved_data.csv'
        $("#approved_table").table2csv();
    });

    function findTotal() {
        var arr = document.getElementsByName('hour');
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseFloat(arr[i].value))
                tot += parseFloat(arr[i].value);
        }
        document.getElementById('total_hours').value = tot;
    }
    $(function () {
        $("input").checkboxradio();
    });
</script>

</html>