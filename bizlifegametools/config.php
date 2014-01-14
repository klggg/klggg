<?php
//批量操作定义
return array(
	//服务器配置
	"server" => array(
		"k1" => array("title" => '上海滩' )
		,"k2" => array("title" => '旧金山' )
		,"k3" => array("title" => '唐人街' )
		,"k4" => array("title" => '夏威夷' )
		,"k5" => array("title" => '华尔街' )
		,"k6" => array("title" => '芝加哥' )
		,"k7" => array("title" => '底特律' )
		,"k8" => array("title" => '洛杉矶' )
		,"ec" => array("title" => '休斯敦' )
		,"k10" => array("title" => '华盛顿' )
		,"k11" => array("title" => '波士顿' )

	)
	//批量操作
	,"batch" => array(
		"3" => array(
				"time" =>180 ,"url" =>"check_staff_batch_cs" ,"title" =>"温和沟通" ,"desc" => "提高董事长的执行和员工的忠诚。"
			)
		,"4" => array(
				"time" =>180 ,"url" =>"check_staff_batch_cs","title" =>"严肃沟通" ,"desc" => "提高董事长的领导、策略和员工的忠诚。"
			)
		,"5" => array(
				"time" =>180 ,"url" =>"check_staff_batch_cs","title" =>"严厉沟通" ,"desc" => "增加您的策略值，提高员工忠诚度。"
			)
		,"9" => array(
				"time" =>300 ,"url" =>"staff_training","title" =>"员工培训" ,"desc" => "提高董事长策略和员工的经验。"
			)
		,"10" => array(
				"time" =>300 ,"url" =>"staff_training" ,"title" =>"员工深造" ,"desc" => "提高员工能力。"
			)
		,"12" => array(
				"time" =>1800  ,"title" =>"看望孤儿院" ,"url" =>"volunteer_volume_do","desc" => "提高员工人品，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。"
			)
		,"13" => array(
				"time" =>1800  ,"title" =>"慰问老人院" ,"url" =>"volunteer_volume_do","desc" => "提高员工人品，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚"
			)
		,"14" => array(
				"time" =>1800 ,"title" =>"红十字会活动" ,"url" =>"volunteer_volume_do","desc" => "提高员工人品和能力，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。"
			)
		,"15" => array(
				"time" =>1800 ,"title" =>"参加环保义工" ,"url" =>"volunteer_volume_do","desc" => "提高员工人品和能力，降低员工忠诚；执行当天报纸倡导的义工，员工不减忠诚。30分钟"
			)
		,"16" => array(
				"time" =>1800 ,"title" =>"参与交通协助" ,"url" =>"volunteer_volume_do","desc" => "提高员工人品和能力，降低员工忠诚；参加当日报纸倡导的义工，员工不减忠诚。30分钟"
			)
	)
);

