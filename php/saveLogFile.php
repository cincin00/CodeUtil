<?php
/* logfile save - start */
$logfile_path = ROOTPATH.'data/logtxt_folder/';


if(!is_dir($logfile_path)){
	mkdir($logfile_path);
	chmod($logfile_path,0777);
}
//$file_delimiter = '파일명 구분자';


//$file_delimiter 변수 사용시 파일명 변수(택1)
//$logfile_name = 'logfile_'.date("Y_m_d_h_i_s",time()).'_'.$file_delimiter.'.txt';


//$file_delimiter 변수 미사용시 파일명 변수(택1)
$logfile_name = 'logfile_'.date("Y_m_d_h_i_s",time()).'_.txt';


$working_logfile = $logfile_path.$logfile_name;
$log_path = fopen($working_logfile,'a+');


$log_var = '기록할 내용/변수 입력';


//변수 출력 방식1(택1)
fwrite($log_path, '파일 내용의  시작'.PHP_EOL);


if(is_array($log_var)){
	foreach($log_var as $key => $val){
		fwrite($log_path, '['.$key.'] => '.$val.PHP_EOL);
	}
}else{
	fwrite($log_path, $log_var.PHP_EOL);
}


//변수 출력 방식2(택1)
//fwrite($log_path, print_r($log_var,TRUE));


fwrite($log_path, '파일 내용의 끝'.PHP_EOL);
fclose($log_path);
/* logfile save - end */