<?php session_start();
$plugin_path = plugins_url();

function video_show_count ()
{
global $wpdb;
$table_name = $wpdb->prefix . "videos";
$video_number= $wpdb->get_results("SELECT * FROM $table_name order by video_id asc limit 0,1");
return $video_number;
}


function query2Array($query) {
$arrayAllRecords = array();
$resQuery = mysql_query($query);
while($rowQuery = mysql_fetch_assoc($resQuery)) {
$arrayAllRecords[] = $rowQuery;
}
return $arrayAllRecords;
}

function query4SingleRecord($query) {
$arrayAllRecords = array();
$resQuery = mysql_query($query);
if(mysql_num_rows($resQuery) > 0 ) {
$rowQuery = mysql_fetch_assoc($resQuery);
} else {
$rowQuery ="";
}				
return $rowQuery;
}



function pr($value){
echo "<pre>";
print_r($value);
echo "</pre>";

}

function checkLogin(){
if(!isset($_SESSION['username'])) {
@header("Location: logIn.php");
exit(0);
}
}

function checkUniqueEmail($email_id, $userId=''){
global $wpdb;
$table_name = $wpdb->prefix . "users";      
if($userId !="" && $userId > 0 ){
$where = " AND ID != '".$userId."' ";
}
$results = mysql_query("select * from $table_name 
where user_email = '".$email_id."' $where ")  or die(mysql_error());
$result = mysql_num_rows($results);
if($result > 0){
return false;
} else {
return true;
}
}


function checkUniqueUser($username){
global $wpdb;
$table_name = $wpdb->prefix . "users";      
$sql="select user_login from $table_name where user_login='".$username."'";
$result=mysql_query($sql) or die (mysql_error().$sql);
$count=mysql_num_rows($result);
if ($count>0) {
return false;
} else {
return true;
}
}


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



/**   
*  generates the error block 
* @param					: $arrErrors array containing errors list
* @return 				: string containing HTML error block
**/

function generateErrorBlock($arrErrors){

$img_url = plugins_url();

if(isset($arrErrors) && (count($arrErrors) > 0)){
$total = count($arrErrors);
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/spryEffects.js"></script>
<?php
$str = "<div id='errorBlock'  style='position:relative;'>
<table  width='400px' style='border:solid 1px red;' align='center' class='row_bg greenBorder' cellpadding='2' cellspacing='0' border='0'>
<tr>
<td width='5%' valign='top' align='left' style='border:none;'> <div style='poition:absolute;'><img src='".$img_url."/user-registration/images/warning.gif' border='0'></div></td>
<td  align='left' width='88%' style='border:none;'>";			
$str .= "</td>
<td width='2%' align='right' style='cursor:pointer;' valign='top' onclick=\"Spry.Effect.DoFade('errorBlock', {duration: 1000, from:  100, to:  0, toggle: true}); setTimeout('Spry.Effect.DoBlind(\'errorBlock\', {duration: 1000, from:  \'100%\', to:  \'0%\', toggle: true})',1000);\">&nbsp;X&nbsp;
</td></tr>";
$str .="<tr><td width='40px'></td><td align='left' valign='top' colspan='2' style='color:red;border:none;' >";
for($i=0; $i < $total; $i++){
$str .= '<li>'.$arrErrors[$i].'</li>';
}
$str .= "</td></tr>";
$str .= "</table></div>";
return $str;
}
return ;
}


/**
* generates the success message
* @param					: $arrSuccess array containing success messages
* @return 				: string containing HTML success messages
**/
function generateSuccessBlock($arrSuccess){
$img_url = plugins_url();
if(isset($arrSuccess) && is_array($arrSuccess) && (count($arrSuccess) > 0)){
$total = count($arrSuccess);
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/spryEffects.js"></script>
<?php
echo '	<script language="javascript">
window.onload = closeMsg;
function closeMsg() {
setTimeout("go_now()",4000);
}
function go_now() {
Spry.Effect.DoFade("successBlock", {duration: 1000, from:  100, to:  0, toggle: true}); 
setTimeout("Spry.Effect.DoBlind(\"successBlock\", {duration: 1000, from:  \"100%\", to:  \"0%\", toggle: true})",1000);
}
</script>
';


$str = "<div id='successBlock'  style='position:relative;'>
<table width='400px' style='border:solid 1px #DDDD9F;' class='row_bg greenBorder' cellpadding='0' align='center' cellspacing='0' border='0'>
<tr><td width='95%' align='left' valign='top'><img src='".$img_url."/video-gallery/images/tick.jpg' border='0'></td><!-- <td width='5px' align='right' style='cursor:pointer;margin-right:1px' valign='middle' onclick=\"Spry.Effect.DoFade('successBlock', {duration: 1000, from:  100, to:  0, toggle: true}); setTimeout('Spry.Effect.DoBlind(\'successBlock\', {duration: 1000, from:  \'100%\', to:  \'0%\', toggle: true})',1000);\">&nbsp;X&nbsp;</td> --></tr>";
for($i=0; $i < $total; $i++){
$str .= "<tr><td style='color:green' colspan='2' align='center'>" . $arrSuccess[$i] . "</td></tr>";
}
$str .= "<tr><td colspan='2' height='2px'></td></tr> ";
$str .= "</table></div>";
return $str;
} 
return ;
}
function getStatusMessage(){
$errorMessage = $_SESSION['ErrorMessage'];
if(isset($errorMessage) && (is_array($errorMessage)) && (count($errorMessage)  > 0)){
$message = generateErrorBlock($errorMessage);
unset($_SESSION['ErrorMessage']);
}else{
$successMessage = $_SESSION['SuccessMessage'];
if(isset($successMessage) && (is_array($successMessage)) && (count($successMessage)  > 0)){
$message = generateSuccessBlock($successMessage);
unset($_SESSION['SuccessMessage']);
}
}
return $message;
}


function GetVideoDropdown($tablename,$default='') {
$html = "";
$sql="SELECT * FROM $tablename";
$results = mysql_query($sql) or die(mysql_error());
while($rows = mysql_fetch_assoc($results)){
if($default !=''){
if(is_array($default) && count($default) > 0 ) {
if(in_array($rows['video_gallery_id'] ,$default)) {
$selected="Selected";
} else {
$selected="";
}		  
} else {
if ($rows['video_gallery_id'] == $default) {
$selected="Selected";
} else {
$selected="";
}
}
} else {
$selected="";
}
@$html .="<option value='".$rows['video_gallery_id']."' ".$selected.">".$rows['gallery_name']."</option>";
}
return $html; 
}

function gallery_video_count($tablename,$gallery_id){
$sql="select *  from $tablename where video_gallery_id='$gallery_id'";
$result=mysql_query($sql) or die (mysql_error().$sql);
$count=mysql_num_rows($result);
return $count;
}

function generateRandStr($length){
$randstr = "";
for($i=0; $i<$length; $i++){
$randnum = mt_rand(0,61);
if($randnum < 10){
$randstr .= chr($randnum+48);
}else if($randnum < 36){
$randstr .= chr($randnum+55);
}else{
$randstr .= chr($randnum+61);
}
}
return $randstr;
} 





?>