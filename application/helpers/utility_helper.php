<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('show'))
{
	function show($data,$exit = FALSE)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";

		if($exit)
		{
			exit();
		}
	}
}

if ( ! function_exists('get_str_compare'))
{
	function get_str_compare($str_compare,$str_input,$return_on_success,$return_on_fail = '',$match_case = FALSE)
	{
		if(!$match_case)
		{ /* case insensitive compare */
			$str_compare  = strtolower($str_compare);

			$str_input  = strtolower($str_input);
		}

		return ($str_input == $str_compare) ? $return_on_success : $return_on_fail;
	}
}

if ( ! function_exists('get_not_str_compare'))
{ /* case sensitive compare */
	function get_not_str_compare($str_compare,$str_input,$return_on_success,$return_on_fail = '',$match_case = FALSE)
	{
		if(!$match_case)
		{
			$str_compare  = strtolower($str_compare);

			$str_input  = strtolower($str_input);
		}

		return ($str_input != $str_compare) ? $return_on_success : $return_on_fail;
	}
}

if ( ! function_exists('highlight_search'))
{
	function highlight_search($str_compare,$str_input,$return_on_success,$return_on_fail = '',$match_case = FALSE)
	{
		if(!$match_case)
		{
			$str_compare  = strtolower($str_compare);

			$str_input  = strtolower($str_input);
		}

		return ($str_input != $str_compare) ? $return_on_success : $return_on_fail;
	}
}

if ( ! function_exists('folder_exist'))
{
	function folder_exist($folder_path)
	{
    	return (file_exists($folder_path) AND is_dir($folder_path));
	}
}


if ( ! function_exists('convert_to_single_dimension_array'))
{
	function convert_to_single_dimension_array($multi_dimension_array,$key_from_multi,$value_from_multi)
	{ //useful to convert into id=>value pair
    	$single_dimension_array = Array();

		foreach ($multi_dimension_array as $multi_dimension)
		{
			$key = $multi_dimension[$key_from_multi];

			$value = $multi_dimension[$value_from_multi];

			$single_dimension_array[$key] = $value;
		}

		return $single_dimension_array;
	}
}

if ( ! function_exists('sanitize_url_param'))
{
	function sanitize_url_param($param)
	{
		$param =  trim($param);

		$param =  urldecode($param);

		return $param =  htmlentities($param);

	}
}

if ( ! function_exists('generate_otp'))
{
	function generate_otp()
	{
	  return random_string('numeric',4);
	}
}


if ( ! function_exists('echo_json'))
{
	function echo_json($json_array,$set_csrf_token = TRUE)
	{
		$CI =& get_instance();

		if($set_csrf_token === TRUE)
		{
			$json_array['mxcsrftkn'] = $CI->security->get_csrf_hash();
		}

		header('Content-Type:application/json');

		echo json_encode($json_array);

		exit;
	}
}

if ( ! function_exists('get_user_profile_picture_url'))
{
	function get_user_profile_picture_url($user_data)
	{

		if(strtolower($user_data['gender']) == 'male')
		{
				$gender_image_name =  SITE_IMAGES_URL.'man.png';
		}
		else if(strtolower($user_data['gender']) == 'female')
		{
			$gender_image_name =  SITE_IMAGES_URL.'woman.png';
		}
		else
		{
			$gender_image_name =  SITE_IMAGES_URL.'default-profile.png';
		}

		if(empty($user_data['profile_img']))
		{
		  $profile_picture =   $gender_image_name;
		}
		else
		{
		  $profile_picture =  (0 === strpos($user_data['profile_img'], 'http')) ? $user_data['profile_img'] : SITE_IMAGES_URL.$user_data['profile_img'];
		}

		return $profile_picture;
	}
}

if ( ! function_exists('is_localhost'))
{
	function is_localhost()
	{
		return (bool) stripos(SITE_URL,'localhost');
	}
}

if ( ! function_exists('device_based_redirect'))
{
	function device_based_redirect($web_url)
	{
		//$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");

		//$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");

		//$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");

		$CI =& get_instance();

    $headers = $CI->input->request_headers();

    if(array_key_exists('Mcxtra', $headers) && !empty($headers['Mcxtra']))
    {

		   if($headers['Mcxtra'] == 'Android')
		   {
		   	$json_array['message'] = 'Welcome to Mcxtra';

		   	echo_json($json_array,FALSE);
		   }
    }

		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");

		if($Android){
			redirect(ANDROID_APP_URL);
		}else {
  		redirect($web_url);
		}
	}
}

if ( ! function_exists('remove_keys'))
{
	function remove_keys($master_array,$keys_array)
	{/* removes unnecessary keys from array (useful when u dont want to serve fileds like created on created by to mobile app)*/
		return array_filter($master_array,function($key) use ($keys_array){
		 												return !in_array($key,$keys_array);
		 										},ARRAY_FILTER_USE_KEY);
	}
}

if ( ! function_exists('remove_http_from_url'))
{
	function remove_http_from_url($url)
	{
		return preg_replace('#^https?://#', '', rtrim($url,'/'));
	}
}

function get_dear_in_email($first_name,$last_name='')
{/* Dear Sir/Madam or Dear FirstName or Dear LastName*/
	if(empty($first_name) AND empty($last_name))
	{
		return ' Sir/Madam';
	}
	else if(!empty($first_name) AND !empty($last_name))
	{
		return $first_name.' '.$last_name;
	}
	else if(empty($first_name))
	{
		return $last_name;
	}
	else
	{
		return $first_name;
	}
}

	function convert_display_to_db_date($str_display_date,$display_date_format = DISPLAY_DATE_FORMATDATE,$db_date_format = DB_ONLY_DATE_FORMAT)
	{
		/* This function is useful when one wants to save form dates to database */
		/* Caution: All Formats should be supported by DateTime::createFromFormat */
		/* Format of $display_date_format must be match with Format of $str_display_date */

		if(empty($db_date_format))
		{
			$db_date_format = DB_ONLY_DATE_FORMAT;
		}

		if(empty($display_date_format))
		{
			$display_date_format = DISPLAY_DATE_FORMATDATE;
		}


		$is_valid_date = FALSE;

		$new_display_date  = DateTime::createFromFormat($display_date_format, $str_display_date);

		if($new_display_date && $new_display_date->format($display_date_format) == $str_display_date)
		{
			$is_valid_date = TRUE;
		}

		if($is_valid_date)
		{
			return $new_display_date->format($db_date_format);
		}
		else
		{
			return NULL;
		}
	}

function convert_db_to_display_date($str_db_date,$db_date_format = DB_ONLY_DATE_FORMAT,$display_date_format = DISPLAY_DATE_FORMATDATE)
{
	/* This function is useful when one wants to display dates from db  */
	/* Caution: All Formats should be supported by DateTime::createFromFormat */
	/* Format of $db_date_format must be match with Format of $str_db_date */

	if(empty($db_date_format))
	{
		$db_date_format = DB_ONLY_DATE_FORMAT;
	}

	if(empty($display_date_format))
	{
		$display_date_format = DISPLAY_DATE_FORMATDATE;
	}

	$is_valid_date = FALSE;


  $new_db_date  = DateTime::createFromFormat($db_date_format, $str_db_date);

	if($new_db_date && $new_db_date->format($db_date_format) == $str_db_date)
	{
		$is_valid_date = TRUE;
	}

   if($is_valid_date)
	{
		return $new_db_date->format($display_date_format);
	}
	else
	{
		return '';
	}
}

function is_valid_date_format($str_date,$format)
{
  $d =  DateTime::createFromFormat($format, $str_date);

	return $d && $d->format($format) == $str_date;
}

if ( ! function_exists('date_validate'))
{
	function date_validate($date)
	{
		if(!empty($date) || $date === NULL)
		{
			return date(DB_ONLY_DATE_FORMAT, strtotime($date));
		}
		else
		{
			return false;
		}
	}
}

if ( ! function_exists('generateRandomString'))
{
	function generateRandomString($length, $prifix , $code_format_type)
 	{
 		switch ($code_format_type) {
    	case 'numeric':
    		$format = '1234567890';
    		break;
    	case 'alpha_u_c':
    		$format = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		break;
    	case 'alpha_l_c':
    		$format = 'abcdefghijklmnopqrstuvwxyz';
    		break;
    	case 'alpha_l_u_c':
    		$format = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    		break;
    	case 'alnum':
    		$format = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    		break;
    	default:
    		$format = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    		break;
    	}
	    $randomString = '';

	    for ($i = 0; $i < $length; $i++) {
	      $randomString .= $format[rand(0, strlen($format) - 1)];
	    }

	    return $prifix.$randomString;
	   
  	}
}



function mask_email($email)
{
	if(!strpos($email,'@'))
	{
		return $email;
	}

	$a = list($name,$domain_part) = explode('@',$email);

	$masked_name = substr($name,0,3).str_repeat('x',mt_rand(3,8));

	$first_dot_position  =   strpos($domain_part,'.');

	$domain_name = substr($domain_part,$first_dot_position);

	$masked_domain_part = str_repeat('x',mt_rand(3,8)).$domain_name;

	$masked_email = $masked_name.'@'.$masked_domain_part;

	return $masked_email;
}

function mask_mobile($mobile)
{
	if(empty($mobile))
	{
		return $mobile;
	}

	return 'xxxxxxx'.substr($mobile,-3);
}

function record_db_error($query)
{
	/*This function writes database error into logs */

	if(ENVIRONMENT !== 'production')
	{
		return;
	}

	$CI =& get_instance();

	$db_error_info = $CI->db->call_function('error',$CI->db->conn_id);

	if(!$db_error_info)
	{
		return;
	}

	$mysql_error_no = $CI->db->call_function('errno',$CI->db->conn_id);

	$backtrace_array = debug_backtrace(FALSE);

	$backtrace_array = $backtrace_array[1];

	$file = $backtrace_array['file'];

	$line = $backtrace_array['line'];

	$message = sprintf("DB Error(%s) %s occurred at  %s -> %s with query:%s",$mysql_error_no,$db_error_info,$backtrace_array['class'],$backtrace_array['function'],$query);

	$CI->lib_log->error_handler('db',$message,$file,$line);
}
