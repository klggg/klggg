<?php
include (dirname(__FILE__).'/../../mylib/CommonHelper.php');
$source_str =<<<EOF
TextView,tv_nick
RoundImageView,iv_avatar
TextView,tv_about
TextView,tv_distance
TextView,iv_lastTime
EOF;

//
//$result_str = <<<EOF
//listItemView.{value}	= ({type}) convertView.findViewById(R.id.{value});
//EOF;
//$result_str = <<<EOF
//public {type} {value};
//EOF;
$result_str = <<<EOF
listItemView.{value}.setText(currModel.{value}());
EOF;



$result = CommonHelper::csv2Array($source_str,array('type','value'));

foreach($result as  $record){

	$tmp_str = str_replace(array('{type}','{value}'),array($record['type'],$record['value']),$result_str);

	echo $tmp_str;
	echo "\n";
}





