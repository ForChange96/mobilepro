<?php
class Validation {
    /**
     * construct method
     */
    public function __construct() {}

    /**
     * Check string member login
     * @param string $strLogin
     * @return boolean
     */
    public static function checkLogin($strLogin) {
        if (preg_match("/^[A-Za-z0-9_s]+$/", (string) $strLogin)) {
            return true;
        } else {
            return false;
        }
    }


    public static function checkMail($email) {
        $result = false;
        $pattern = '/^(([a-z0-9!#$%&\/*+-=?^_`\'{|}~]'.
            '[a-z0-9!#$%&\/*+-=?^_`\'{|}~.]*'.
            '[a-z0-9!#$%&\/*+-=?^_`\'{|}~])'.
            '|[a-z0-9!#$%&\/*+-?^_`\'{|}~]|'.
            '("[^",<>]+"))'.
            '[@]((?:[-a-z0-9]+\.)+[a-z]{2,})$/ix';

        $value = str_replace('\"', '', $email);
        $result = preg_match($pattern, $value);
        if ($result) {
            $aryItem = explode('@', $email);
            array_pop($aryItem);
            $value1 = join('@', $aryItem);
            if (strpos($value1, '..') !== false || $value1{0} == '.' || $value1{strlen($value1) - 1} == '.') {
                $result = false;
            }
        }
        return $result;
    }

    public static function checkImage($image){
        $file_name = $image['name'];
        $extent_file = "gif|jpg|png";
        $pattern = "#.+\.(gif|jpg|png)$#i";

        if(preg_match($pattern,$extent_file)==1){
            $file_name = true;
        }
        else{
            $file_name = false;
        }
    }

    /**
     * Checks that a value is a valid URL according to http://www.w3.org/Addressing/URL/url-spec.txt
     *
     * @param string $check Value to check
     * @return boolean Success
     * @access public
     */
    public static function checkURL($url) {
        return preg_match('|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }

    public static function checkNumber() {}

    public static function checkDate() {}

    public static function checkTime() {}

    public static function checkPhone() {}

}
?>
