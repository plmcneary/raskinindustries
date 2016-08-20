<?
class validate
{

function isEmail($email)
{
if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i",
    $email))
{
return false;
}
else
return true;
}

function isInt($var)
{
if(eregi("^[0-9]+$", $var))
{
return true;
}
else
return false;

}

function MessageTextArea($var)
{
if(eregi("^[A-Za-z0-9!@#+%*=&\n\r\/`'/(())-?:;,. ]+$", $var))
{
return true;
}
else
{return false;
}

}

function AllowedForTextArea($var)
{$newcar=str_replace(chr(13),"RETURNKEY",$var);

if(eregi("^[A-Za-z0-9!\n\r\/`'/(())?:;,. ]+$", $newcar))
{
return true;
}
else
{return false;
}

}


function checkAddress($var)
{$newcar=str_replace(chr(13),"RETURNKEY",$var);

if(eregi("^[A-Za-z0-9!\/`'/(()):,. ]+$", $newcar))
{
return true;
}
else
{return false;
}

}




function AllowedForBrand($var)
{$newcar=str_replace(chr(13),"RETURNKEY",$var);

if(eregi("^[A-Za-z0-9!\n\r\/`'/(())?:;,. ]+$", $newcar))
{
return true;
}
else
{return false;
}

}
function MessageTextAreaForRecommend($var)
{	if(eregi("^[A-Za-z0-9!\n\r\%*\/`'/-:;,. ]+$", $var))
{
return true;
}
else return false;

}


function isFloat($var)
{
if(eregi("^[0-9.]+$", $var))
{
return true;
}
else
return false;


}

function onlyString($var)
{
if(eregi("^[a-zA-Z. ]+$", $var))
{
return true;
}
else
return false;

}

function StringAndDigits($var)
{
if(eregi("^[a-zA-Z0-9]+$", $var))
{
return true;
}
else
return false;

}


function SpecialCharacterCheck($var)
{
if(eregi("^[%&$\"/'`<>/\;!~`^]+$", $var))
{
return true;
}
else
{
return false;
}

}




function CheckForSpecialCharacter($var,$pattern)
{

//$pattern=;

if(preg_match($pattern, $var, $match))
{
return true;
}
else
{
return false;

}

}

function SpecialCharacterCheckForCNAME($var)
{

if(eregi("[%$\"/`/<>!~`^+#]", $var))
{

return true;
}
else
{

return false;
}

}


function SpecialCharacterCheckForURL($var)
{

if(eregi("[%$\"/`'/<>;!~`^+#]", $var))
{

return true;
}
else
{

return false;
}

}

function AllowedForBusinessCity($var)
{
if(eregi("^[-a-zA-Z ]+$", $var))
{
return true;
}
else
return false;

}

function StringDigitWithSpacesAndComma($var)
{
if(eregi("^[a-zA-Z0-9, ]+$", $var))
{
return true;
}
else
return false;

}
function DigitWithCommaAndDash($var)
{
if(eregi("^[0-9,.-]+$", $var))
{
return true;
}
else
return false;

}

function DigitWithDecimal($var)
{
if(eregi("^[0-9.]+$", $var))
{
return true;
}
else
return false;

}
function DigitWithAndComma($var)
{
if(eregi("^[0-9,.]+$", $var))
{
return true;
}
else
return false;

}
function Price($var)
{
if(eregi("^[0-9.]+$", $var))
{
$findDotArr=explode(".",$var);
$noofdot=count($findDotArr);
if($noofdot>2)
return false;
elseif(strlen(end($findDotArr))>2 && $noofdot>1)
return false;
else

return true;
}
else
return false;

}


function DigitWithAndSpaces($var)
{
if(eregi("^[0-9 ]+$", $var))
{
return true;
}
else
return false;

}

function DigitWithAndDash($var)
{
if(eregi("^[0-9\-]+$", $var))
{
return true;
}
else
return false;

}
function StringDigitWithSpacesAndCommaAndSlash($var)
{
if(eregi("^[a-zA-Z0-9,\/_# ]+$", $var))
{
return true;
}
else
return false;

}

function StringDigitWithSpacesAndCommaAndSlashAndBrackets($var)
{
if(eregi("^[/`'/a-zA-Z0-9,(())-\/_ ]+$", $var))
{
return true;
}
else
return false;

}

function StringDigitWithSpacesAndCommaAndSlashAndDash($var)
{
if(eregi("^[a-zA-Z0-9,-\/_ ]+$", $var))
{
return true;
}
else
return false;

}

function StringWithSpacesAndComma($var)
{
if(eregi("^[a-zA-Z, ]+$", $var))
{
return true;
}
else
return false;

}


function StringWithSpacesAndDash($var)
{
if(eregi("^[a-zA-Z -]+$", $var))
{
return true;
}
else
return false;

}

function StringWithSpaces($var)
{
if(eregi("^[a-zA-Z ]+$", $var))
{
return true;
}
else
return false;

}

function StringWithSpacesAndInvertedComma($var)
{
if(eregi("^[/`'/a-zA-Z ]+$", $var))
{
return true;
}
else
return false;

}


function firstNameLastNAme($var)
{
if(preg_match("/[a-zA-Z\s]/", $var))
{
return true;
}
else
return false;

}




function firstNameLastNAmeOnRegisterationPages($var)
{
if(eregi("^[a-zA-Z]+$", $var))
{
return true;
}
else
return false;

}



function StringWithSpacesAndDigit($var)
{
if(eregi("^[a-zA-Z0-9 ]+$", $var))
{
return true;
}
else
return false;

}

function AllowedatRegister($var)
{
if(eregi("^[a-zA-Z0-9,-(())& ]+$", $var))
{
return true;
}
else
return false;

}

function AllowedForCatname($var)
{
if(eregi("^[a-zA-Z0-9,& -;]+$", $var))
{
return true;
}
else
return false;

}

function AllowedForTradename($var)
{
if(eregi("^[a-zA-Z0-9&; ]+$", $var))
{
return true;
}
else
return false;

}

function isValidPhone($var)
{
if(eregi("^[-0-9 ]+$", $var))
{
return true;
}
else
return false;

}
function isValidPhoneCode($var)
{
if(eregi("[0-9(),+ -]", $var))
{
return true;
}
else
return false;

}

function isValidPhoneNumber($var) {
if(eregi("^[-0-9()+ -]+$", $var))
{
return true;
}
else
return false;
}

function isValidTelePhone($var)
{
if(eregi("[0-9()+ ]", $var))
{
return true;
}
else
return false;

}

function isValidCode($var)
{
if(eregi("[0-9()+]", $var))
{
return true;
}
else
return false;

}

function isEmpty($var, $errorType=0)
{
$var = rtrim(ltrim($var));
if($var=="" or strlen($var)==0 or empty($var))	return true;

}




function isUsZip($var)
{
if(preg_match("/\(?\d{5}/x",$var))	return true;
$regex = "/
\(?     # optional parentheses
\d{3} # area code
\)?     # optional parentheses
[-\s.]? # separator is either a dash, a space, or a period.
\d{3} # 3-digit prefix
[-\s.]  # another separator
\d{4} # 4-digit line number
/x";

if(preg_match($regex, $var))
return true;
else
return false;
}

function isValidUrl($var)
{
if( eregi("^(http|https)+(:\/\/)+[a-z0-9_-]+\.+[a-z0-9_-]", $var ))
{
return true;
}
else
{
return false;
}
}

function StringWithSpacesAndDigit4Search($var)
{

$pattern='/["%>|<]/i';
if(preg_match($pattern, $var, $match))
{
return false;
}
else
{
return true;

}

}

}

?>
