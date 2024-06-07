<?php
function wib_time($mount){
	$a = array (
		'januari',
		'februari',
		'maret',
		'april',
		'mei',
		'juni',
		'juli',
		'agustus',
		'september',
		'oktober',
		'november',
		'desember'
	);

	if ($mount === "01"){
		return $a['0'];
	}
	elseif ($mount === "02") {
		return $a['1'];
	}
	elseif ($mount === "03") {
		return $a['2'];
	}
	elseif ($mount === "04") {
		return $a['3'];
	}
	elseif ($mount === "05") {
		return $a['4'];
	}
	elseif ($mount === "06") {
		return $a['5'];
	}
	elseif ($mount === "07") {
		
	}
	elseif ($mount === "08") {
		return $a['7'];
	}
	elseif ($mount === "09") {
		return $a['8'];
	}
	elseif ($mount === "10") {
		return $a['9'];
	}
	elseif ($mount === "11") {
		return $a['10'];
	}
	elseif ($mount === "12") {
		return $a['11'];
	}else{
		return 'DATE ERROR';
	}
}