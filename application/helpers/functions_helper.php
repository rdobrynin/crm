<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/**
 * Show role
 */

if (!function_exists('show_role')) {
  function show_role($role) {
    $result='none';
    if($role == 5) {
      $result = lang('role_master');
    }
    else if($role == 4) {
      $result = lang('role_curator');
    }
    else if($role == 1) {
        $result = lang('role_customer');
    }
    else if($role == 2) {
        $result = lang('role_implementor');
    }
    else if($role == 0) {
        $result = lang('role_guest');
    }
    return $result;
  }
}

/**Show language string
 *
 */

if (!function_exists('show_lang')) {
    function show_lang($lang) {
        if($lang == 'russian') {
            $result = 'Русский';
        }
        else if($lang == 'estonian') {
            $result = 'Eesti';
        }
        else {
            $result='english';
        }
        return $result;
    }
}

/**
 * Show prefix of language
 */

if (!function_exists('show_pref_lang')) {
    function show_pref_lang($lang) {
        if($lang == 'russian') {
            $result = 'ru';
        }
        else if($lang == 'estonian') {
            $result = 'et';
        }
        else {
            $result='en';
        }
        return $result;
    }
}


/**
 * short lastname with trim
 */

if (!function_exists('lastname_letter')) {
    function lastname_letter($str) {
       $result = $str[0];
        $result = strtoupper($result);
        return $result.'...';
    }
}


/**
 * short name with trim
 */

if (!function_exists('short_name')) {
    function short_name($str) {
        $arr = explode(' ',trim($str));
       $fname = $arr[0];
        $lname = $arr[1];
        $full_name =$fname.' '.(substr($lname, 0, 1).'...');
        return $full_name;
    }
}

/**
 * Task statuses
 */

if (!function_exists('task_status')) {
  function task_status($status) {
    $result=0;
      if($status == 6) {
          $result = 'overdue';
      }
    if($status == 5) {
      $result = 'ready';
    }
    else if($status == 4) {
      $result = 'pause';
    }
    else if($status == 3) {
      $result = 'complete';
    }
    else if($status == 2) {
      $result = 'process';
    }
    else if($status == 1) {
        $result = 'unwanted';
    }
    else if($status == 0) {
      $result = 'approve';
    }
    return $result;
  }
}

/**
 * Task label
 */

if (!function_exists('task_status_label')) {
    function task_status_label($status) {
        $result=0;
        if($status == 6) {
            $result = 'label-danger';
        }
        if($status == 5) {
            $result = 'label-primary';
        }
        else if($status == 4) {
            $result = 'label-default';
        }
        else if($status == 3) {
            $result = 'label-info';
        }
        else if($status == 1) {
            $result = 'label-default';
        }
        else if($status == 2) {
            $result = 'label-success';
        }
        else if($status == 0) {
            $result = 'label-warning';
        }
        return $result;
    }
}

if (!function_exists('task_type_label')) {
    function task_type_label($status) {
        $result=0;
        if($status == 1) {
            $result = 'label-danger';
        }
        else if($status == 2) {
            $result = 'label-success';
        }
        else if($status == 3) {
            $result = 'label-warning';
        }
        else if($status == 4) {
            $result = 'label-primary';
        }
        else if($status == 5) {
            $result = 'label-info';
        }
        else if($status == 6) {
            $result = 'label-primary';
        }
        else if($status == 7) {
            $result = 'label-danger';
        }
        else if($status == 8) {
            $result = 'label-info';
        }
        return $result;
    }
}



/**
 * project statuses
 */

if (!function_exists('project_status')) {
    function project_status($status) {
        $result=0;
        if($status == 3) {
            $result = 'frozen';
        }
        else if($status == 2) {
            $result = 'complete';
        }
        else if($status == 1) {
            $result = 'process';
        }
        else if($status == 0) {
            $result = 'approve';
        }
        return $result;
    }
}


/**
 * priority status
 */

if (!function_exists('priority_status_index')) {
    function priority_status_index($status) {
        $result=0;
        if($status == 0) {
            $result = 'minor';
        }
        else if($status == 1) {
            $result = 'major';
        }
        else if($status == 2) {
            $result = 'critical';
        }
        return $result;
    }
}

/**
 * get countries
 */

if (!function_exists('get_countries')) {
  function get_countries() {
    $country = array(
      "-1" => "Select Country",
      "AF" => "Afghanistan",
      "AL" => "Albania",
      "DZ" => "Algeria",
      "AS" => "American Samoa",
      "AD" => "Andorra",
      "AO" => "Angola",
      "AI" => "Anguilla",
      "AQ" => "Antarctica",
      "AG" => "Antigua and Barbuda",
      "AR" => "Argentina",
      "AM" => "Armenia",
      "AW" => "Aruba",
      "AU" => "Australia",
      "AT" => "Austria",
      "AZ" => "Azerbaijan",
      "BS" => "Bahamas",
      "BH" => "Bahrain",
      "BD" => "Bangladesh",
      "BB" => "Barbados",
      "BY" => "Belarus",
      "BE" => "Belgium",
      "BZ" => "Belize",
      "BJ" => "Benin",
      "BM" => "Bermuda",
      "BT" => "Bhutan",
      "BO" => "Bolivia",
      "BA" => "Bosnia and Herzegowina",
      "BW" => "Botswana",
      "BV" => "Bouvet Island",
      "BR" => "Brazil",
      "IO" => "British Indian Ocean Territory",
      "BN" => "Brunei Darussalam",
      "BG" => "Bulgaria",
      "BF" => "Burkina Faso",
      "BI" => "Burundi",
      "KH" => "Cambodia",
      "CM" => "Cameroon",
      "CA" => "Canada",
      "CV" => "Cape Verde",
      "KY" => "Cayman Islands",
      "CF" => "Central African Republic",
      "TD" => "Chad",
      "CL" => "Chile",
      "CN" => "China",
      "CX" => "Christmas Island",
      "CC" => "Cocos (Keeling) Islands",
      "CO" => "Colombia",
      "KM" => "Comoros",
      "CG" => "Congo",
      "CK" => "Cook Islands",
      "CR" => "Costa Rica",
      "CI" => "Cote D'Ivoire",
      "HR" => "Croatia",
      "CU" => "Cuba",
      "CY" => "Cyprus",
      "CZ" => "Czech Republic",
      "DK" => "Denmark",
      "DJ" => "Djibouti",
      "DM" => "Dominica",
      "DO" => "Dominican Republic",
      "TL" => "East Timor",
      "EC" => "Ecuador",
      "EG" => "Egypt",
      "SV" => "El Salvador",
      "GQ" => "Equatorial Guinea",
      "ER" => "Eritrea",
      "EE" => "Estonia",
      "ET" => "Ethiopia",
      "FK" => "Falkland Islands (Malvinas)",
      "FO" => "Faroe Islands",
      "FJ" => "Fiji",
      "FI" => "Finland",
      "FR" => "France",
      "FX" => "France, Metropolitan",
      "GF" => "French Guiana",
      "PF" => "French Polynesia",
      "TF" => "French Southern Territories",
      "GA" => "Gabon",
      "GM" => "Gambia",
      "GE" => "Georgia",
      "DE" => "Germany",
      "GH" => "Ghana",
      "GI" => "Gibraltar",
      "GR" => "Greece",
      "GL" => "Greenland",
      "GD" => "Grenada",
      "GP" => "Guadeloupe",
      "GU" => "Guam",
      "GT" => "Guatemala",
      "GN" => "Guinea",
      "GW" => "Guinea-bissau",
      "GY" => "Guyana",
      "HT" => "Haiti",
      "HM" => "Heard and Mc Donald Islands",
      "HN" => "Honduras",
      "HK" => "Hong Kong",
      "HU" => "Hungary",
      "IS" => "Iceland",
      "IN" => "India",
      "ID" => "Indonesia",
      "IR" => "Iran (Islamic Republic of)",
      "IQ" => "Iraq",
      "IE" => "Ireland",
      "IL" => "Israel",
      "IT" => "Italy",
      "JM" => "Jamaica",
      "JP" => "Japan",
      "JO" => "Jordan",
      "KZ" => "Kazakhstan",
      "KE" => "Kenya",
      "KI" => "Kiribati",
      "KP" => "Korea, Democratic People's Republic of",
      "KR" => "Korea, Republic of",
      "KW" => "Kuwait",
      "KG" => "Kyrgyzstan",
      "LA" => "Lao People's Democratic Republic",
      "LV" => "Latvia",
      "LB" => "Lebanon",
      "LS" => "Lesotho",
      "LR" => "Liberia",
      "LY" => "Libyan Arab Jamahiriya",
      "LI" => "Liechtenstein",
      "LT" => "Lithuania",
      "LU" => "Luxembourg",
      "MO" => "Macau",
      "MK" => "Macedonia, The Former Yugoslav Republic of",
      "MG" => "Madagascar",
      "MW" => "Malawi",
      "MY" => "Malaysia",
      "MV" => "Maldives",
      "ML" => "Mali",
      "MT" => "Malta",
      "MH" => "Marshall Islands",
      "MQ" => "Martinique",
      "MR" => "Mauritania",
      "MU" => "Mauritius",
      "YT" => "Mayotte",
      "MX" => "Mexico",
      "FM" => "Micronesia, Federated States of",
      "MD" => "Moldova, Republic of",
      "MC" => "Monaco",
      "MN" => "Mongolia",
      "MS" => "Montserrat",
      "MA" => "Morocco",
      "MZ" => "Mozambique",
      "MM" => "Myanmar",
      "NA" => "Namibia",
      "NR" => "Nauru",
      "NP" => "Nepal",
      "NL" => "Netherlands",
      "AN" => "Netherlands Antilles",
      "NC" => "New Caledonia",
      "NZ" => "New Zealand",
      "NI" => "Nicaragua",
      "NE" => "Niger",
      "NG" => "Nigeria",
      "NU" => "Niue",
      "NF" => "Norfolk Island",
      "MP" => "Northern Mariana Islands",
      "NO" => "Norway",
      "OM" => "Oman",
      "PK" => "Pakistan",
      "PW" => "Palau",
      "PA" => "Panama",
      "PG" => "Papua New Guinea",
      "PY" => "Paraguay",
      "PE" => "Peru",
      "PH" => "Philippines",
      "PN" => "Pitcairn",
      "PL" => "Poland",
      "PT" => "Portugal",
      "PR" => "Puerto Rico",
      "QA" => "Qatar",
      "RE" => "Reunion",
      "RO" => "Romania",
      "RU" => "Russian Federation",
      "RW" => "Rwanda",
      "KN" => "Saint Kitts and Nevis",
      "LC" => "Saint Lucia",
      "VC" => "Saint Vincent and the Grenadines",
      "WS" => "Samoa",
      "SM" => "San Marino",
      "ST" => "Sao Tome and Principe",
      "SA" => "Saudi Arabia",
      "SN" => "Senegal",
      "SC" => "Seychelles",
      "SL" => "Sierra Leone",
      "SG" => "Singapore",
      "SK" => "Slovakia (Slovak Republic)",
      "SI" => "Slovenia",
      "SB" => "Solomon Islands",
      "SO" => "Somalia",
      "ZA" => "South Africa",
      "GS" => "South Georgia and the South Sandwich Islands",
      "ES" => "Spain",
      "LK" => "Sri Lanka",
      "SH" => "St. Helena",
      "PM" => "St. Pierre and Miquelon",
      "SD" => "Sudan",
      "SR" => "Suriname",
      "SJ" => "Svalbard and Jan Mayen Islands",
      "SZ" => "Swaziland",
      "SE" => "Sweden",
      "CH" => "Switzerland",
      "SY" => "Syrian Arab Republic",
      "TW" => "Taiwan",
      "TJ" => "Tajikistan",
      "TZ" => "Tanzania, United Republic of",
      "TH" => "Thailand",
      "TG" => "Togo",
      "TK" => "Tokelau",
      "TO" => "Tonga",
      "TT" => "Trinidad and Tobago",
      "TN" => "Tunisia",
      "TR" => "Turkey",
      "TM" => "Turkmenistan",
      "TC" => "Turks and Caicos Islands",
      "TV" => "Tuvalu",
      "UG" => "Uganda",
      "UA" => "Ukraine",
      "AE" => "United Arab Emirates",
      "GB" => "United Kingdom",
      "US" => "United States",
      "UM" => "United States Minor Outlying Islands",
      "UY" => "Uruguay",
      "UZ" => "Uzbekistan",
      "VU" => "Vanuatu",
      "VA" => "Vatican City State (Holy See)",
      "VE" => "Venezuela",
      "VN" => "Viet Nam",
      "VG" => "Virgin Islands (British)",
      "VI" => "Virgin Islands (U.S.)",
      "WF" => "Wallis and Futuna Islands",
      "EH" => "Western Sahara",
      "YE" => "Yemen",
      "RS" => "Serbia",
      "CD" => "The Democratic Republic of Congo",
      "ZM" => "Zambia",
      "ZW" => "Zimbabwe",
      "JE" => "Jersey",
      "BL" => "St. Barthelemy",
      "XU" => "St. Eustatius",
      "XC" => "Canary Islands",
      "ME" => "Montenegro"
    );
      return $country;
  }


    /**
     * Date difference
     */

    if (!function_exists('time_ago')) {
        function time_ago ($date, $rcs = 0) {
            $tm= strtotime($date);
            $cur_tm = time();
            $dif = $cur_tm - $tm;
            $pds = array('second','minute','hour','day','week','month','year','decade');
            $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);

            for ($v = count($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);
            if ($v < 0)
                $v = 0;
            $_tm = $cur_tm - ($dif % $lngh[$v]);

            $no = ($rcs ? floor($no) : round($no)); // if last denomination, round

            if ($no != 1)
                $pds[$v] .= 's';
            $x = $no . ' ' . $pds[$v];

            if (($rcs > 0) && ($v >= 1))
                $x .= ' ' . $this->time_ago($_tm, $rcs - 1);

            return $x;
        }
    }

    /**
     * check deadline status
     */


    if (!function_exists('check_deadline')) {
        function check_deadline ($date) {
            $nowtime = time();
            $tm= strtotime($date);
            if($tm<=$nowtime) {
                $result = 'danger';
            }
            else {
                $result = false;
            }
            return $result;
        }
    }



    if (!function_exists('check_cts')) {
        function check_cts ($date,$rcs = 0) {
            $nowtime = time();


            if($date == '0') {
                $x = '--';
            }
            else {

                $dif = $nowtime - $date;
                $pds = array('second','min','h','day','week','month','year','decade');
                $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);

                for ($v = count($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);
                if ($v < 0)
                    $v = 0;
                $_tm =  $nowtime - ($dif % $lngh[$v]);

                $no = ($rcs ? floor($no) : round($no)); // if last denomination, round

                if ($no != 1)
                    $pds[$v] .= 's';
                $x = $no . ' ' . $pds[$v];

                if (($rcs > 0) && ($v >= 1))
                    $x .= ' ' . $this->time_ago($_tm, $rcs - 1);
            }


            return $x;

        }
    }





  }
