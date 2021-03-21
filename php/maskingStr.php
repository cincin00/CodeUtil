<?php
	$name = '';
	$pattern = '/[가-힣|ㄱ-ㅎ|ㅏ-ㅣ|A-Za-z|0-9]/u';
	$subject = $name;
	$flags = PREG_PATTERN_ORDER;
	$result = preg_match_all($pattern, $subject, $matches, $flags);
	$str = '';
	for($i=0; $i<=$result-3; $i++) {
		$str .= '*';
	}
	$name = $matches[0][0].$str.$matches[0][$result-1];
