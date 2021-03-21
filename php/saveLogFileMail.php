<?php
	/* logfile save - start */
	$logfile_path = ROOTPATH.'data/logtxt_folder/';
	if(!is_dir($logfile_path)){
		mkdir($logfile_path);
		chmod($logfile_path,0777);
	}
	$logfile_name = 'logfile_'.date("Y_m_d_h_i_s",time()).'.txt';$working_logfile = $logfile_path.$logfile_name;
	$log_path = fopen($working_logfile,'a+');
	if($log_path!=TRUE){
		if($_SERVER['REMOTE_ADDR'] == "106.246.242.226"){
			alert('파일 경로가 없거나 비정상적입니다.');
			debug('파일 경로가 없거나 비정상적입니다.');
			exit;
		}
	}
	if('메일전송조건입력'){
		$to = '전송메일입력';
		$subject =  '메일 제목 입력';
		$message = '메일내용 입력';
		$result_mail = mail($to, $subject, $message);
	}
	$log_var = '로그 기록 변수 입력';
	fwrite($log_path, '파일 내용의 시작'.PHP_EOL);
	if(is_array($log_var)){
		foreach($log_var as $key => $val){
			fwrite($log_path, '['.$key.'] => '.$val.PHP_EOL);
		}}else{
		fwrite($log_path, $log_var.PHP_EOL);
	}
	fwrite($log_path, '파일 내용의 끝'.PHP_EOL);
	fclose($log_path);
	/* logfile save - end */