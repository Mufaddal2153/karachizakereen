<?php

//for debuging
function d($mParam, $bExit = 0, $bVarDump = 0, $echoInFile = 0) {
    ob_start();

    print get_back_trace("\n");
    if (!$bVarDump) {
        print_r($mParam);
    } else {
        var_dump($mParam);
    }
    $sStr = htmlspecialchars(ob_get_contents());
    ob_clean();
    if ($echoInFile) {
        file_put_contents(__DIRNAME__ . 'd.log', $sStr, FILE_APPEND);
    } else {
        echo '<hr><pre>' . $sStr . '</pre><hr>';
    }
    if ($bExit)
        exit;
}

function initSession($name = '',$session_id = null) {
    //write and close current session
    if (session_id()) {
        $a = session_id();
        if ($a == '')
            session_start();
        session_unset();
        if (!$session_id)
        session_regenerate_id(true);
    }

    if ($session_id) {
        session_id($session_id);
    }
    session_name($name);
    session_start();
}

function get_back_trace($NL = "\n") {
    $dbgTrace = debug_backtrace();
    $dbgMsg = "Trace[";
    foreach ($dbgTrace as $dbgIndex => $dbgInfo) {
        if ($dbgIndex > 0 && isset($dbgInfo['file'])) {
            $dbgMsg .= "\t at $dbgIndex  " . $dbgInfo['file'] . " (line {$dbgInfo['line']}) -> {$dbgInfo['function']}(" . (isset($dbgInfo['args']) ? count($dbgInfo['args']) : 0) . ")$NL";
        }
    }
    $dbgMsg .= "]" . $NL;
    return $dbgMsg;
}

function get_index($prefix) {
    $number = Model::factory('IndexNumber')->where('prefix',$prefix)->where('is_published',1)->max('id');
    if($number)
        $a=$number+1;
    else
        $a= 1;
    try {$oModel=Model::factory('IndexNumber')->create();
        $oModel->set('id',$a);
        $oModel->set('prefix',$prefix);
        $oModel->save();
    } catch(Exception $e){}
    return str_pad($a, 3, '0', STR_PAD_LEFT);

}

function checkResourcePermission($key, $level = false){
    $aPermissions = array();
    if(isset($_SESSION['aPermissions']) && isset($_SESSION['aPermissions'][$key])){
        $aPermissions = $_SESSION['aPermissions'][$key]['permissions'];
        if($level){
            return in_array($level,$aPermissions);
        }
        return $aPermissions;
    }
    return false;
}

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' AND ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'ZERO',
        1                   => 'ONE',
        2                   => 'TWO',
        3                   => 'THREE',
        4                   => 'FOUR',
        5                   => 'FIVE',
        6                   => 'SIX',
        7                   => 'SEVEN',
        8                   => 'EIGHT',
        9                   => 'NINE',
        10                  => 'TEN',
        11                  => 'ELEVEN',
        12                  => 'TWELVE',
        13                  => 'THIRTEEN',
        14                  => 'FOURTEEN',
        15                  => 'FIFTEEN',
        16                  => 'SIXTEEN',
        17                  => 'SEVENTEEN',
        18                  => 'EIGHTEEN',
        19                  => 'NINETEEN',
        20                  => 'TWENTY',
        30                  => 'THIRTY',
        40                  => 'FOURTY',
        50                  => 'FIFTY',
        60                  => 'SIXTY',
        70                  => 'SEVENTY',
        80                  => 'EIGHTY',
        90                  => 'NINETY',
        100                 => 'HUNDRED',
        1000                => 'THOUSAND',
        1000000             => 'MILLION',
        1000000000          => 'BILLION',
        1000000000000       => 'TRILLION',
        1000000000000000    => 'QUADRILLION',
        1000000000000000000 => 'QUINTILLION'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function qsNumberFormat($value) {
    return number_format($value, 0, '.', '');
}

function compareObject($key) {
    return function ($a, $b) use ($key) {
        return strcmp($a->{$key}, $b->{$key});
    };
}

function qsTimeTrack($sDate, $bFlag = false){
    $result = "";
    $now = time(); 
    $your_date = strtotime($sDate);
    if(!$bFlag){
        $datediff = $now - $your_date;
    } else {
        $datediff = $your_date - $now;
    }
    $time = round($datediff/(60*60*24));
    if($time > 0){
        $result = $time . ' days ago';
    } else {
        $hour = floor($datediff/(60*60));
        $min = floor(($datediff-($hour * 60 * 60))/(60));
        if($hour > 0 || $min > 0)
            $result = str_pad(($hour>0?$hour:0),2,"0",STR_PAD_LEFT) .':'.str_pad(($min>0?$min:0),2,"0",STR_PAD_LEFT).' min ago';
        else
            $result = ' Today';
    }
    return $result;
}

function qsDateFormat($value) {
    return date('d/m/Y', strtotime($value));
}

function getAddressField($aAddress, $type, $sField){
    return isset($aAddress) && isset($aAddress[$type]) && $aAddress[$type] && isset($aAddress[$type][$sField]) ? $aAddress[$type][$sField] : '';
}

function getModelField($aObj, $sField, $isExport = false){
    $sResult = isset($aObj) && $aObj && isset($aObj[$sField]) ? ($isExport ? explode(',',$aObj[$sField]) : $aObj[$sField]): '';
    return $sResult;
}

function qsDateDiff($dateFirst, $dateSecond) {
    $date_1 = strtotime($dateFirst);
    $date_2 = strtotime($dateSecond);
    $dateDiff = $date_1 - $date_2;

    return floor($dateDiff / 3600 / 24);
}

function createPdf($html, $title, $pageFormat = PDF_PAGE_FORMAT, $type = 'I', $watermark = false) {
// create new PDF document
    $pdf = new AppVendorTcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageFormat, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($title);
    $pdf->SetSubject($title);
    $pdf->SetKeywords('Hub, Faiz, Faizmb, Receipt, Dubai');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ID#' . $oModel->receipt_number, PDF_HEADER_STRING);
// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// Add background image
// set font
//$pdf->SetFont('dejavusans', '', 10);
// add a page
    $pdf->AddPage();

// test some inline CSS
//d($html,1);

    if ($watermark) {
        $img_file = __DIRNAME__ . 'assets/img/watermark.jpg';
        $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $pdf->setPageMark();
    }
    //$html = $pdf->fixHTMLCode($html);
    $tagvs = array(
        'h1' => array(0 => array('h' => 1, 'n' => 3), 1 => array('h' => 1, 'n' => 2)),
        'h3' => array(0 => array('h' => 1, 'n' => 1), 1 => array('h' => 1, 'n' => 1)),
        'h4' => array(0 => array('h' => 1, 'n' => 0), 1 => array('h' => 1, 'n' => 1)),
        'table' => array(0 => array('h' => 1, 'n' => 1), 1 => array('h' => 1, 'n' => 1)),
        'div' => array(0 => array('h' => "", 'n' => 0), 1 => array('h' => 1, 'n' => 0)),
        //'P' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)),
        'h2' => array(0 => array('h' => 1, 'n' => 2), 1 => array('h' => 1, 'n' => 1)));
    $pdf->setHtmlVSpace($tagvs);
    $pdf->writeHTML($html, true, false, false, false, '');

//  reset pointer to the last page
//$pdf->lastPage();
//Close and output PDF document
    $name = trim(str_replace(' ', '_', strtolower($title)));
    if ($type == 'S') {
        return $pdf->Output($name . '.pdf', $type);
    } else {
        $pdf->Output($name . '.pdf', $type);
    }
//echo $html;
    exit();
}

function sendEmail($subj, $body, $emails, $cc = false, $bcc = false, $attachment = false, $filename = '', $bcc_addresses = array(), $content_type = false) {
    $mail = new PHPMailer();
    if (MAIL_SMTP) {
        $mail->IsSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
    }
    //$mail->From = ADMIN_EMAIL;
    $oModel = Model::factory('User')->where('is_email',1)->where('is_deleted',0)->find_one();
    $mail->From=$oModel->email;
    $mail->FromName = ADMIN_NAME;
    $mail->isHtml(true);
    if(is_array($emails)) {
        foreach ($emails as $email) {
            $mail->AddAddress($email);
        }
    } else {
        $mail->AddAddress($emails);
    }


    if ($cc) {
        $mail->AddCC($cc);
    }
    if ($bcc) {
        $mail->AddBCC($bcc);
    }

    foreach ($bcc_addresses as $address) {
        $mail->AddBCC($address);
    }

    if (empty($emails)) {
        $mail->AddAddress(ADMIN_EMAIL);
    } else {
        $mail->AddBCC(ADMIN_NAME);
    }


    if ($attachment) {
        if ($content_type) {
            $mail->AddStringAttachment($attachment, $filename, "base64", $content_type);
        } else {
            $mail->AddStringAttachment($attachment, $filename);
        }
    }


    $mail->Subject = $subj;
    $mail->Body = $body;
    $mail->Send();
       // d($mail,1);
        /*return $mail->ErrorInfo;
    } else {*/
        return true;
    //}
}

function __($sWord, $aParams = array(),$containerDiv = true) {
    global $_lang, $_arLang;
    $aWord = array();
    if (isset($_lang[$sWord]) && $_lang[$sWord] != "") {
        if (empty($aParams))
            $aWord[] = $_lang[$sWord];
        else {
            $aFuncParams = array_merge(array($_lang[$sWord]), $aParams);
            $aWord[] = call_user_func_array("sprintf", $aFuncParams);
        }
    }
    if (isset($_arLang[$sWord]) && $_arLang[$sWord] != '') {
        $word = ($containerDiv ? "<div " : "<span ") . "class='lang_arr'>";
        if (empty($aParams))
            $word .= $_arLang[$sWord];
            // $aWord[] =  . $_arLang[$sWord] . ($containerDiv ? "</div>" : "");
        else {
            $aFuncParams = array_merge(array($_arLang[$sWord]), $aParams);
            // $aWord[] = "<div class='lang_arr'>" . call_user_func_array("sprintf", $aFuncParams) . "</div>";
            $word .= call_user_func_array("sprintf", $aFuncParams);
        }
        $word .= ($containerDiv ? "</div>" : "</span>");
        $aWord[] = $word;
    }
    if (!empty($aWord)) {
        $sWord = join('', $aWord);
    }
    return $sWord;
}

/**
 * Convert a string to camel case, optionally capitalizing the first char and optionally setting which characters are
 * acceptable.
 *
 * First, take existing camel case and add a space between each word so that it is in Title Form; note that
 *   consecutive capitals (acronyms) are considered a single word.
 * Second, capture all contigious words, capitalize the first letter and then convert the rest into lower case.
 * Third, strip out all the non-desirable characters (i.e, non numerics).
 *
 * EXAMPLES:
 * $str = 'Please_RSVP: b4 you-all arrive!';
 *
 * To convert a string to camel case:
 *  strtocamel($str); // gives: PleaseRsvpB4YouAllArrive
 *
 * To convert a string to an acronym:
 *  strtocamel($str, true, 'A-Z'); // gives: PRBYAA
 *
 * To convert a string to first-lower camel case without numerics but with underscores:
 *  strtocamel($str, false, 'A-Za-z_'); // gives: please_RsvpBYouAllArrive
 *
 * @param  string  $str              text to convert to camel case.
 * @param  bool    $capitalizeFirst  optional. whether to capitalize the first chare (e.g. "camelCase" vs. "CamelCase").
 * @param  string  $allowed          optional. regex of the chars to allow in the final string
 *
 * @return string camel cased result
 *
 * @author Sean P. O. MacCath-Moran   www.emanaton.com
 */
function strtocamel($str, $capitalizeFirst = true, $allowed = 'A-Za-z0-9') {
    return str_replace(
            array(
        '/([A-Z][a-z])/e', // all occurances of caps followed by lowers
        '/([a-zA-Z])([a-zA-Z]*)/e', // all occurances of words w/ first char captured separately
        '/[^' . $allowed . ']+/e', // all non allowed chars (non alpha numerics, by default)
        '/^([a-zA-Z])/e' // first alpha char
            ), array(
        '" ".$1', // add spaces
        'strtoupper("$1").strtolower("$2")', // capitalize first, lower the rest
        '', // delete undesired chars
        'strto' . ($capitalizeFirst ? 'upper' : 'lower') . '("$1")' // force first char to upper or lower
            ), $str
    );
}

function addRoutes($app, $authenticate) {
    $string = file_get_contents("routes.json");
    $aRoutes = json_decode($string, true);
    $sRoute = $app->request()->getResourceUri();
    if ($aRoutes) {
        foreach ($aRoutes as $aRoute) {
            if ($aRoute['route'] == $sRoute) {

                $mAuth = function() {
                    
                };
                if ($aRoute['auth']) {
                    $mAuth = $authenticate($app);
                }
                $mCallback = function() {
                    
                };
                if ($aRoute['controller']) {
                    $mCallback = "Controller" . $aRoute['controller'];
                    if ($aRoute['method'] != "") {
                        $mCallback .=":" . $aRoute['method'];
                    } else {
                        $mCallback .=":index";
                    }
                }
                $app->{$aRoute['type']}($aRoute['route'], $mAuth, $mCallback);
            }
        }
    }
}

function uploadFile($files, $directory) {
    $json = array();
    if (isset($files['name']) && !empty($files['tmp_name'])) {
        $directory = rtrim(DIR_FILES . '/' . str_replace('../', '', $directory), '/');

        if (!is_dir($directory)) {
            mkdir($directory,0777,true);
        }
        $allowed = array(
            'image/jpeg',
            'image/pjpeg',
            'image/jpg',
            'image/png',
            'image/x-png',
            'image/gif',
            'image/bmp',
            'text/plain',
            'text/richtext',
            "text/csv",
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'application/pdf',
            'application/x-pdf'
        );
        $num_files = count($files['name']);
        for($i=0;$i<$num_files;$i++) {
            if ((strlen(utf8_decode($files['name'][$i])) < 3) || (strlen(utf8_decode($files['name'][$i])) > 255)) {
                $json['error'] = 'Invalid file name.File name should be greater than 3 characters & less than 255 characters';
            }
            if ($files['size'][$i] > 1000000) {
                $json['error'] = 'File size too big.file size cannot be greater than 1 MB';
            }

            if (!in_array($files['type'][$i], $allowed)) {
                $json['error'] = 'File type incorrect';
            }

            if ($files['error'][$i] != UPLOAD_ERR_OK) {
                $json['error'] = 'Invalid file uploaded';
            }

            if (!isset($json['error'])) {
                $dir = $directory . '/' . (isset($files['new_name']) ? $files['new_name'][$i] : basename($files['name'][$i]));
                if (@move_uploaded_file($files['tmp_name'][$i], $dir)) {
                    $json['success'] = 'File Uploaded Successfully';
                } else {
                    $json['error'] = 'Cannot save uploaded file';
                }
            }
        }
    } else {
        $json['error'] = __('error_file');
    }
    return $json;
}

function uploadImage($files, $directory) {
    $json = array();
    if (isset($files['name']) && trim($files['tmp_name']) != '') {
        $directory = rtrim(DIR_FILES . '/' . str_replace('../', '', $directory), '/');

        if (!is_dir($directory)) {
            mkdir($directory,0777,true);
        }
        $allowed = array(
            'image/jpeg',
            'image/pjpeg',
            'image/jpg',
            'image/png',
            'image/x-png',
            'image/gif',
            'image/bmp',
            'text/plain',
            'text/richtext',
            "text/csv",
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'application/pdf',
            'application/x-pdf'
        );
            if ((strlen(utf8_decode($files['name'])) < 3) || (strlen(utf8_decode($files['name'])) > 255)) {
                $json['error'] = 'Invalid file name.File name should be greater than 3 characters & less than 255 characters';
            }
            if ($files['size'] > 1000000) {
                $json['error'] = 'File size too big.file size cannot be greater than 1 MB';
            }

            if (!in_array($files['type'], $allowed)) {
                $json['error'] = 'File type incorrect';
            }

            if ($files['error'] != UPLOAD_ERR_OK) {
                $json['error'] = 'Invalid file uploaded';
            }

            if (!isset($json['error'])) {
                $dir = $directory . '/' . (isset($files['new_name']) ? $files['new_name'] : basename($files['name']));
                if (@move_uploaded_file($files['tmp_name'], $dir)) {
                    $json['success'] = $dir;
                } else {
                    $json['error'] = 'Cannot save uploaded file';
                }
            }
        }

    return $json;
}

function getTableCols($table) {
    $fields = ORM::for_table($table)->raw_query('SHOW COLUMNS FROM ' . $table)->find_many();
    $cols = array();
    if($fields) {
        $cols = CHtml::listData($fields,'Field','Field');
    }
    return $cols;
}

function loadModule($class,$params = array(),$method = 'index') {
//    try {
    $class = 'Controller' . $class;
    $obj = new $class;
//    if(!method_exists($obj,'index')) {
//        throw new Exception('Index method does not exists for the Module.Index method is needed in order to initialize module');
//    }
    return call_user_func_array(array($obj,$method),$params);
//    }
//    catch(Exception $e) {
//    }
}

function randomPassword() {
    $alphabet = "0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function uploadSingleFile($file, $directory) {
    $json = array();
    try {
        if (!isset($file['name']) || $file['tmp_name'] == '')
            throw new Exception(__('error_file'));

        $directory = rtrim(DIR_FILES . '/' . str_replace('../', '', $directory), '/');

        if (!is_dir($directory)) {
            mkdir($directory,0777,true);
        }
        $allowed = array(
            'image/jpeg',
            'image/pjpeg',
            'image/jpg',
            'image/png',
            'image/x-png',
            'image/gif',
            'image/bmp',
            'text/plain',
            'text/richtext',
            "text/csv",
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'application/pdf',
            'application/x-pdf'
        );

        if ((strlen(utf8_decode($file['name'])) < 3) || (strlen(utf8_decode($file['name'])) > 255))
            throw new Exception('Invalid file name.File name should be greater than 3 characters & less than 255 characters');
        if ($file['size'] > 1000000)
            throw new Exception('File size too big.file size cannot be greater than 1 MB');
        if (!in_array($file['type'], $allowed))
            throw new Exception('File type incorrect');
        if ($file['error'] != UPLOAD_ERR_OK)
            throw new Exception('Invalid file uploaded');

        $dir = $directory . '/' . (isset($file['new_name']) ? $file['new_name'] : basename($file['name']));
        if (!@move_uploaded_file($file['tmp_name'], $dir))
            throw new Exception('Cannot save uploaded file');
        $json['success'] = 'File Uploaded Successfully';
    }
    catch(Exception $e) {
        $json['error'] = $e->getMessage();
    }
    return $json;
}


?>