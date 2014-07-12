<?PHP

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ws_common_model {

    var $rand_key;

    public function __construct() {
        
    }

    //-------Public Helper functions -------------
    public function GetSelfScript() {
        return htmlentities($_SERVER['PHP_SELF']);
    }

    public function SafeDisplay($value_name) {
        if (empty($_POST[$value_name])) {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }



   

    public function GetSpamTrapInputName() {
        return 'sp' . md5('KHGdnbvsgst' . $this->rand_key);
    }

  
    /*
      Sanitize() function removes any potential threat from the
      data submitted. Prevents email injections or any other hacker attempts.
      if $remove_nl is true, newline chracters are removed from the input.
     */

    public function Sanitize($str, $remove_nl = true) {
        $str = $this->StripSlashes($str);

        if ($remove_nl) {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
            );
            $str = preg_replace($injections, '', $str);
        }

        return $str;
    }

    public function StripSlashes($str) {
        if (get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return $str;
    }

    public function SanitizeForSQL($str) {
        if (function_exists("mysql_real_escape_string")) {
            $ret_str = mysql_real_escape_string($str);
        } else {
            $ret_str = addslashes($str);
        }
        return $ret_str;
    }

}
