<?php

function fre_child_convert_profile($profile){

	if( current_user_can('manage_options') )
		return $profile;

	$name 		= explode(" ", $profile->author_name);
	//var_dump($name);
	if( isset($name[1]) ){
		$profile->author_name = $name[0]. ' '.$name[1][0];
	}
	if( isset($name[2]) && !empty($name[2]) ){
		$profile->author_name.=$name[2];
	}
	return $profile;
}
add_filter( 'ae_convert_fre_profile', 'fre_child_convert_profile',99 );
function fre_child_convert_bid($bid){

	if( current_user_can('manage_options') )
		return $bid;

	$name = explode(" ", $bid->profile_display);

	if( isset($name[1]) ){
		$bid->profile_display = $name[0]. ' '.$name[1][0];
	}
	return $bid;
}

add_filter( 'ae_convert_bid', 'fre_child_convert_bid', 99 );

//profile_display 