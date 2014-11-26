<?
	$startup = '';

	$startup = $_POST["startupCheck"];
	$company = $_POST["company"];
	$email = $_POST["email"];

	if ($startup == 'isStartup') {
		$message = 'A startup ' . $company .' gostaria de ser contactada para ' . $email;
		$Subject = '[startup] Novo Request';
	} else {
		$message = 'A empresa ' . $company .' gostaria de ser contactada para ' . $email;
		$Subject = 'Novo Request';
	}

	if ($email != '') {
		if ($company != '') {
			$headers = 'From: Sponsor Page <geral@sinfo.org>';

   			mail('geral@sinfo.org', $Subject, $message, $headers);
		}
	}
    
    header('Location: ../sponsor.html');

?>