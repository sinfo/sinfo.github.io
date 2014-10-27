<?
	$company = $_POST["company"];
	$email = $_POST["email"];

	$message = 'A empresa ' . $company .' gostaria de ser contactada para torloro' . $email;
    $Subject = 'Novo Request';
    $headers = 'From: Sponsor Page <geral@sinfo.org>';

    mail('geral@sinfo.org', $Subject, $message, $headers);

    header('Location: ../sponsor.html');

?>