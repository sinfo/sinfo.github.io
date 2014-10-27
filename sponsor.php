<? 
// define variables and set to empty values
$companyErr = $emailErr = $companyCheck = $emailCheck = "";
$company = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	   if (empty($_POST["company"])) {

	     $companyErr = "Company or Entity name is required";
	   } else {

		     $company = validation($_POST["company"]);
		     // check if name only contains letters and whitespace
		     if (!preg_match("/^[a-zA-Z ]*$/",$company)) {
		       $companyErr = "Only letters and white space allowed";
		     } else {
		     	$companyCheck = 'OK';
		     }

	   }

	   if (empty($_POST["email"])) {

	     $emailErr = "Email is required";
	   } else {

		     $email = validation($_POST["email"]);
		     // check if e-mail address is well-formed
		     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		       $emailErr = "Invalid email format"; 
		     } else {
		     	$emailCheck = 'OK';
		     }
	   }

	   if (($companyCheck == 'OK') AND ($emailCheck == 'OK')) {
	   	
		   	 //Send
		    $message = 'A empresa ' . $company .' gostaria de ser contactada para ' . $email;
		    $Subject = 'Novo Request';
		    $headers = 'From: Sponsor Page <geral@sinfo.org>';

		    mail('geral@sinfo.org', $Subject, $message, $headers);

		    header('Location: sponsor.php');
		}/* else {
			/*header('Location: sponsor.php#more-information');*
		} */
	}

	function validation($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>
			SINFO
		</title>
		<meta name="description" content="SINFO is an annual not-for-profit event organised exclusively by college students who strive for a more interesting and ground-breaking event each edition.">
		<meta name="author" content="SINFO">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="img/favicon.ico" type="image/x-icon" />

		<meta property="og:title" content="SINFO" />
		<meta property="og:url" content="http://sinfo.github.io/" />
		<meta property="og:image" content="http://sinfo.github.io/img/sinfocheio.jpg" />
		<meta property="og:description" content="SINFO is an annual not-for-profit event organised exclusively by college students who strive for a more interesting and ground-breaking event each edition." />

		<!-- load inks css -->
		<link rel="stylesheet" type="text/css" href="css/vendor/ink/ink-flex.min.css">
		<link rel="stylesheet" type="text/css" href="css/vendor/ink/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- load inks css for IE8 -->
		<!--[if lt IE 9 ]>
			<link rel="stylesheet" href="css/vendor/ink/ink-ie.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<![endif]-->

		<!-- test browser flexbox support and load legacy grid if unsupported -->
		<script type="text/javascript" src="js/vendor/
		ink/modernizr.js"></script>
		<script type="text/javascript">
			Modernizr.load({
				test: Modernizr.flexbox,
				nope : 'css/vendor/ink/ink-legacy.min.css'
			});
		</script>

		<!-- load inks javascript files -->
		<script type="text/javascript" src="js/vendor/ink/holder.js"></script>
		<script type="text/javascript" src="js/vendor/ink/ink-all.min.js"></script>
		<script type="text/javascript" src="js/vendor/ink/autoload.js"></script>

		<!-- my stuff -->
		<link rel="stylesheet" type="text/css" href="css/sponsors/styles.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/sponsors/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="js/sponsors/jquery.localScroll.min.js"></script>
		<script type="text/javascript" src="js/sponsors/code.js"></script>
		<script type="text/javascript" src="js/sponsors/sponsorEffect.js"></script>
	</head>

	<body>
		<div id="topbar">
			<nav class="ink-navigation ink-grid hide-small hide-tiny ie7">
				<ul class="menu horizontal flat black shadowed">
					<li>
						<a class="logoPlaceholder" href="#" title="SINFO">Sponsor  <img src="img/logo.png"></a>
					</li>
					<li><a href="#description">Description</a></li>
					<li><a href="#reasons">Reasons to sponsor</a></li>
					<li><a href="#conditions">Sponsorship conditions</a></li>
					<li><a href="#deadlines">Deadlines</a></li>
					<li><a href="#more-information">More information</a></li>
				</ul>
			</nav>

			<nav class="ink-navigation ink-grid hide-all show-small">
				<ul class="menu vertical flat black">
					<li class="title">
						<a class="logoPlaceholder push-left" href="#" title="SINFO">Sponsor  <img src="img/logotext.png"></a>
						<button class="toggle" data-target="#topbar_menu"><span class="fa fa-reorder"></span></button>
					</li>
				</ul>

				<ul class="menu vertical flat black hide-all" id="topbar_menu">
					<li><a href="#description">Description</a></li>
					<li><a href="#reasons">Reasons to sponsor</a></li>
					<li><a href="#conditions">Sponsorship conditions</a></li>
					<li><a href="#deadlines">Deadlines</a></li>
					<li><a href="#more-information">More information</a></li>
				</ul>
			</nav>
		</div>

		<div class="sponsor-header" id="sponsor-header">
		  <div class="opacidade">
			<h1>
				<a href="#" title="">Sponsor us!</a>
			</h1>
			<div class="description2">
				See how you can help us creating the biggest SINFO ever!
			</div>
		  </div>
		</div>

		<br><br>

		<div class="ink-grid">
			<div id="description" class="column-group gutters">
				<div class="all-100">
					<h2>Description</h2>
					<p>In case you are not familiar with us, we invite you to visit our <a href="http://www.sinfo.org/">homepage</a> presenting the several elements of our event. You can also visit the <a href="http://xxi.sinfo.org/">XXI SINFO website</a>, the 2014 edition.</p>
				</div>
			</div>
			<div id="reasons" class="column-group gutters">
				<div class="all-100">
					<h2>Reasons to sponsor</h2>
					<ul>
						<li>To give information about the company to potential <b>future employees</b>, graduated in a college with excellent national and international renown.</li>
						<li>To project the company's image and brand, in the media (in previous editions, we were advertised, or covered, by Expresso, Correio da Manhã, RTP2, SIC Radical and many others).</li>
						<li>To publicize <b>opportunities for internships and MsC/Phd theses</b> offered by your company</li>
						<li>Highlight the company's brand, compared to its competitors.</li>
					</ul>
				</div>
			</div>

			<div id="conditions" class="column-group gutters">
				<div class="all-100">
					<h2>Sponsorship conditions</h2>
					<h3>Packages</h3>

					<div class="container">
						<div class="heading"><div class="toggle">+</div>Anual</div>
						<div class="content">
							<div class="PackageContent">Package Content</div>
							<table class="all-100 medium-100 small-100 tiny-100">
								<thead>
									<tr>
				            <th class="all-40">Item</th>
				            <th class="all-15">Sponsor</th>
				            <th class="all-15">Partner</th>
				            <th class="all-15">Premium</th>
				            <th class="all-15">Exclusive</th>
									</tr>
								</thead>
								<tbody>
								<tr class="item">
									<td><div class="toggle">+</div>Post(s) Personalizado nas Redes Sociais</td><td>-</td><td>1</td><td>2</td><td>3</td>
						            <tr class="description"><td colspan="5" class="noPadding">
						            	<div class="shadow">
							            	<h3>Post(s) Personalizado nas Redes Sociais</h3>
											<p>Colocação de um ou mais posts, personalizados de acordo com os critérios da empresa, nas redes sociais da SINFO.</p>
										</div>
						            </td></tr>
								</tr>
								<tr class="item alternate">
									<td><div class="toggle">+</div>Patrocinar Workshop</td><td>-</td><td>-</td><td>1</td><td>2</td>
						            <tr class="description"><td colspan="5" class="noPadding">
						            	<div class="shadow">
							            	<h3>Patrocinar Workshop</h3>
											<p>Patrocínio de um ou mais dos workshops organizados pela SINFO durante 1 ano.</p>
										</div>
						            </td></tr>
								</tr>
								<tr class="item">
									<td><div class="toggle">+</div>Logo Rollups Anual</td><td>-</td><td>M</td><td>L</td><td>XL</td>
						            <tr class="description"><td colspan="5" class="noPadding">
						            	<div class="shadow">
							            	<h3>Logo Rollups Anual</h3>
											<p>Possibilidade de colocar o logo no rollup da SINFO que estará presente em todos os eventos organizados pela SINFO durante 1 ano.</p>
										</div>
						            </td></tr>
								</tr>
								<tr class="price">
									<td>Price</td><td>5€</td><td>5€</td><td>5€</td><td>5€</td>
								</tr>
								<tr class="alterprice">
									<td>Individual Price</td><td>10€</td><td>10€</td><td>10€</td><td>10€</td>
								</tr>
								<tr class="perks">
									<td colspan="5"><h3>Perks</h3></td>
								</tr>
								<tr class="perksDescription">
									<td colspan="5">
										<p>Jantar com membros da comissão/finalistas - Possibilidade de realizar um jantar privado com diversos membros da comissão de acordo com os interesses da empresa.</p>
										<p>Currículos - Entrega dos currículos submetidos pelos alunos a todas as empresas participantes no evento.</p>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="heading"><div class="toggle">+</div>Main Event</div>
						<div class="content">
							<div class="PackageContent">Package Content</div>
								<table class="all-100">
									<thead>
										<tr>
								            <th class="all-40">Item</th>
								            <th class="all-15">Silver</th>
								            <th class="all-15">Gold</th>
								            <th class="all-15">Platinum</th>
								            <th class="all-15">Diamond</th>
										</tr>
									</thead>
									<tbody>
									<tr class="item">
										<td><div class="toggle">+</div>Patrocinio de Palestra</td><td>-</td><td>-</td><td>-</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Patrocionio de Palestra</h3>
												<p>Referência à empresa no ínicio e fim da palestra, logo nos materiais a referir “sponsored by” e logo fixo no stream. Outras formas de patrocínio da palestra poderão ser consideradas com a organização.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Apresentação</td><td>-</td><td>√</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Apresentação</h3>
												<p>Apresentação da empresa para uma plateia de alunos que visitam o evento.					Permitem que a empresa dê a conhecer aos alunos a sua área de trabalho, os projectos em que estão envolvidos e oportunidades de emprego que existem na empresa.</p>
												<ul style="list-style-type:disc;">
												<li>É uma sessão de 45 minutos divididos da seguinte maneira:</li>
												<ol>
												<li>5 minutos para a empresa se dar a conhecer.</li>
												<li>
												30 minutos de apresentação (Preferência por oradores Engenheiros e ex-alunos de LEIC/IST)</li>
												<li>Apresentações semi-técnicas costumam ser preferidos pelos alunos.</li>
												<li>10 minutos para perguntas e respostas.</li>

												</ol>
												<li>Nas salas do Centro de Congressos (com capacidade para 50 ou 70 lugares).</li>
											</ul>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Stand X dias Y Locais</td><td>-</td><td>1</td><td>2</td><td>3</td>
							            <tr class="description"><td colspan="5" class="noPadding">
								            <div class="shadow">
								            	<h3>Stand X dias Y Locais </h3>
												<p>Possibilidade de colocar um stand durante o evento ou fora deste durante um dos eventos organizados pela SINFO, noutra data, dentro ou fora do Instituto Superior Técnico.
												</p>
												<li>Dimensões 3 x 3 x 2,5 metros</li>
												<li>Alcatifado.</li>
												<li>Parede atrás, e dos lados caso o stand esteja ao lado de um outro stand.</li>
												<li>Ficha electrica tripla.</li>
												<li>3 focos de luz.</li>
												<li>Lettering com o nome da empresa.</li>
												<li>2 mesas</li>
												<li>2 cadeiras</li>
												</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Dar Workshop</td><td>-</td><td>√</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Dar Workshop</h3>
												<p>Possibilidade de dar um Workshop a uma plateia de alunos que visitam o evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Patrocinar Workshop</td><td>-</td><td>√</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Patrocinar Workshop</h3><p>Patrocínio de um dos Workshops organizados pela SINFO durante o evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Post(s) Personalizado nas Redes Sociais</td><td>-</td><td>1</td><td>2</td><td>3</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Post(s) Personalizado nas Redes Sociais</h3>
												<p>Colocação de um ou mais posts, personalizados de acordo com os critérios da empresa, nas redes sociais da SINFO.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Pitch in-between talks</td><td>-</td><td>√</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Pitch in-between talks</h3>
												<p>Realização de uma pitch de apresentação da empresa ou de um tema à escolha durante os intervalos entre as palestras.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Actividade personalizada</td><td>-</td><td>-</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Actividade personalizada</h3>
												<p>A empresa poderá sugerir e acordar com a SINFO a realização de uma actividade personalizada, moldada aos interesses da empresa, durante o evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Meetup ao final do dia</td><td>-</td><td>√</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Meetup ao final do dia</h3>
												<p>Realização de um encontro informal com alguns dos participantes, no final de um dos dias do evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="price">
										<td>Price</td><td>5€</td><td>5€</td><td>5€</td><td>5€</td>
									</tr>
									<tr class="alterprice">
										<td>Individual Price</td><td>10€</td><td>10€</td><td>10€</td><td>10€</td>
									</tr>
									<tr class="perks">
										<td colspan="5"><h3>Perks</h3></td>
									</tr>
									<tr class="perksDescription">
										<td colspan="5">
											<p>Desconto no almoço (cantina Civil) - Possibilidade de almoçar na cantina de Civil do IST a um preço reduzido.</p>
											<p>Estacionamento durante as Apresentações - Autorização para estacionar as viaturas no interior do IST durante o período em que decorre a apresentação da empresa.</p>
											<p>Passe de acesso ao evento para X pessoas - Acesso a todas as actividades do evento: Palestras, Workshops, Apresentações e Exposição Tecnológica.</p>
											<p>Password de acesso a Wi-Fi - Acesso livre à rede de Wi-Fi do IST durante o período do evento.</p>
											<p>Possibilidade de acesso priveligiado às Palestras - Lugar reservado nas palestras para os membros da empresa durante o evento.</p>
											<p>Acesso ao coffee-break - Acesso à zona de coffee-break durante a manhã e depois de almoço.</p>
											<p>Jantar com membros da comissão/finalistas - Possibilidade de realizar um jantar privado com diversos membros da comissão de acordo com os interesses da empresa.</p>
											<p>Currículos - Entrega dos currículos submetidos pelos alunos a todas as empresas participantes no evento.</p>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
							<div class="heading"><div class="toggle">+</div>Publicidade</div>
							<div class="content">
								<div class="PackageContent">Package Content</div>
								<table class="all-100">
									<thead>
										<tr>
					            <th class="all-40">Item</th>
					            <th class="all-15">Baixa</th>
					            <th class="all-15">Média</th>
					            <th class="all-15">Alta</th>
					            <th class="all-15">Exclusiva</th>
										</tr>
									</thead>
									<tbody>
									<tr class="item">
										<td><div class="toggle">+</div>Logo on folders</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on folders</h3>
												<p>Your company's logo will be included in the folders distributed for free during the event.<br>
												The folders include the event program and informative documentation of participating companies.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Post(s) on Social Networks</td><td>-</td><td>1</td><td>2</td><td>3</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Post(s) on Social Networks</h3>
												<p>Posting ads on our pages:</p>
												<ul>
													<li><a href="https://www.facebook.com/sinfoist">Facebook</a> - post size limit: 500 characters.</li>
													<li><a href="https://twitter.com/sinfo_ist">Twitter</a> - post size limit: 140 characters.</li>
												</ul>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo in our website</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo in our website</h3>
												<p>Logotipo no site na secção dos patrocinadores do evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Documentation in the folders</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Documentation in the folders</h3>
												<p>Possibility to include in the folders distributed for free during the event documentation, brochures,<br>
												or other information on your company.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo Showcase</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo Showcase</h3>
												<p>The company's logo will appear on the Showcase panel.<br>
												The Showcase is a space, in the technology exposition, reserved for interaction with speakers,<br>exhibits and technology demonstrations.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on posters</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on posters</h3>
												<p>The company's logo will be included in all posters posted at IST, other major colleges in our country and<br>
												the advertising partners SINFO.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo on placemats</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on placemats</h3>
												<p>The company's logo will be placed in individual placemats.</p>
												<p>Placemats will be placed in the week prior to the event and the week of the event at:</p>
												<ul>
													<li>All the IST canteens.</li>
													<li>Other Lisbon universities' canteens.</li>
												</ul>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on flyers</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on flyers</h3>
												<p>Inclusion of your company logo in all programs distributed for free before and during the event.</p>
												<p><small>Timetable of twentieth edition of SINFO.</small></p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo on T-Shirts</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on T-Shirts</h3>
												<p>The company's logo will be present in the back of every sold T-Shirt.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on our Website (Everywhere)</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on our Website (Everywhere)</h3>
												<p>Logotipo no site da SINFO que estará visível em todas as páginas do website.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo on banners</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on banners</h3>
												<p>The company's logo will be included in all banners that we have at campus gates as well as in several<br>
												campus buildings.</p>
												<p><small>Banner placed at the main entrance of the IST (at Alameda campus) in the nineteenth edition of SINFO.</small></p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on our social networks cover photo</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on our social networks cover photo</h3>
												<p>Logotipo no cabeçalho das páginas das redes sociais da SINFO.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Personalized ad</td><td>-</td><td>-</td><td>√</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Personalized ad</h3>
												<p>Divulgação pela SINFO de vídeos promocionais da empresa nos ecrãs espalhados pelo recinto durante o evento.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on pens</td><td>-</td><td>-</td><td>-</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on pens</h3>
												<p>Gold sponsor exclusive: every pen distributed in the event will have the company logo.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo on merchandise</td><td>-</td><td>-</td><td>-</td><td>√</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on merchandise</h3>
												<p>Your company's logo will be present on the following merchandising items:</p>
												<ul>
													<li>Notebooks</li>
													<li>Pins</li>
													<li>Stress balls</li>
													<li>Coin purse</li>
													<li>Bracelets</li>
												</ul>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo on our Website</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo on our Website</h3>
												<p> Logotipo no cabeçalho do site da SINFO, vísivel em todas as páginas do website.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item">
										<td><div class="toggle">+</div>Logo during stream</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo during stream</h3>
												<p> Logotipo no cabeçalho do site da SINFO, vísivel em todas as páginas do website.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="item alternate">
										<td><div class="toggle">+</div>Logo Banner</td><td>-</td><td>M</td><td>L</td><td>XL</td>
							            <tr class="description"><td colspan="5" class="noPadding">
							            	<div class="shadow">
								            	<h3>Logo Banner</h3>
												<p> Logotipo no cabeçalho do site da SINFO, vísivel em todas as páginas do website.</p>
											</div>
							            </td></tr>
									</tr>
									<tr class="price">
										<td>Price</td><td>5€</td><td>5€</td><td>5€</td><td>5€</td>
									</tr>
									<tr class="alterprice">
										<td>Individual Price</td><td>10€</td><td>10€</td><td>10€</td><td>10€</td>
									</tr>
									</tbody>
								</table>
							</div>
					</div>

					<br><br>

					<h3>Individual items</h3>
					<p>The following items can be purchased individually. For more info on prices associated with these elements, contact the committee member assigned to contact your company.</p>

					<div class="container">
						<div class="heading"><div class="toggle">+</div>Main Event</div>
						<div class="content">
							<div class="indPackDescription">
                <table class="all-100">
                  <tbody>
                    <tr class="item">
                    <td><div class="toggle">+</div>Dar Workshop</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Dar Workshop</h3>
                              <p>Possibilidade de dar um Workshop a uma plateia de alunos que visitam o evento.</p>
                            </div>
                          </td></tr>
                    </tr>
                    <tr class="item alternate">
                      <td><div class="toggle">+</div>Apresentação</td><td>5€</td>
                            <tr class="description"><td colspan="2" class="noPadding">
                              <div class="shadow">
                                <h3>Apresentação</h3>
                          <p>Apresentação da empresa para uma plateia de alunos que visitam o evento.         Permitem que a empresa dê a conhecer aos alunos a sua área de trabalho, os projectos em que estão envolvidos e oportunidades de emprego que existem na empresa.</p>
                          <ul style="list-style-type:disc;">
                          <li>É uma sessão de 45 minutos divididos da seguinte maneira:</li>
                          <ol>
                          <li>5 minutos para a empresa se dar a conhecer.</li>
                          <li>
                          30 minutos de apresentação (Preferência por oradores Engenheiros e ex-alunos de LEIC/IST)</li>
                          <li>Apresentações semi-técnicas costumam ser preferidos pelos alunos.</li>
                          <li>10 minutos para perguntas e respostas.</li>

                          </ol>
                          <li>Nas salas do Centro de Congressos (com capacidade para 50 ou 70 lugares).</li>
                        </ul>
                        </div>
                            </td></tr>
                    </tr>
                    <tr class="item">
                    <td><div class="toggle">+</div>Patrocinio de Palestra</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Patrocionio de Palestra</h3>
                        <p>Referência à empresa no ínicio e fim da palestra, logo nos materiais a referir “sponsored by” e logo fixo no stream. Outras formas de patrocínio da palestra poderão ser consideradas com a organização.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Post(s) Personalizado nas Redes Sociais</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Post(s) Personalizado nas Redes Sociais</h3>
                        <p>Colocação de um ou mais posts, personalizados de acordo com os critérios da empresa, nas redes sociais da SINFO.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item">
                    <td><div class="toggle">+</div>Documentation in the folders</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Documentation in the folders</h3>
                        <p>Possibility to include in the folders distributed for free during the event documentation, brochures,<br>
                        or other information on your company.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Innovation Awards Sponsorship</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Innovation Awards Sponsorship</h3>
                        <p>Colocação de um ou mais posts, personalizados de acordo com os critérios da empresa, nas redes sociais da SINFO.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item">
                    <td><div class="toggle">+</div>Stand 1 dia</td><td>1</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Stand 1 dia</h3>
                        <p>Possibilidade de colocar um stand durante o evento ou fora deste durante um dos eventos organizados pela SINFO, noutra data, dentro ou fora do Instituto Superior Técnico.
                        </p>
                        <li>Dimensões 3 x 3 x 2,5 metros</li>
                        <li>Alcatifado.</li>
                        <li>Parede atrás, e dos lados caso o stand esteja ao lado de um outro stand.</li>
                        <li>Ficha electrica tripla.</li>
                        <li>3 focos de luz.</li>
                        <li>Lettering com o nome da empresa.</li>
                        <li>2 mesas</li>
                        <li>2 cadeiras</li>
                        </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Stand 2 dias</td><td>3€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Stand 2 dias</h3>
                        <p>Possibilidade de colocar um stand durante o evento ou fora deste durante um dos eventos organizados pela SINFO, noutra data, dentro ou fora do Instituto Superior Técnico.
                        </p>
                        <li>Dimensões 3 x 3 x 2,5 metros</li>
                        <li>Alcatifado.</li>
                        <li>Parede atrás, e dos lados caso o stand esteja ao lado de um outro stand.</li>
                        <li>Ficha electrica tripla.</li>
                        <li>3 focos de luz.</li>
                        <li>Lettering com o nome da empresa.</li>
                        <li>2 mesas</li>
                        <li>2 cadeiras</li>
                        </div>
                          </td></tr>
                  </tr>
                   <tr class="item">
                    <td><div class="toggle">+</div>Stand 3 dias</td><td>1</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Stand 3 dias</h3>
                        <p>Possibilidade de colocar um stand durante o evento ou fora deste durante um dos eventos organizados pela SINFO, noutra data, dentro ou fora do Instituto Superior Técnico.
                        </p>
                        <li>Dimensões 3 x 3 x 2,5 metros</li>
                        <li>Alcatifado.</li>
                        <li>Parede atrás, e dos lados caso o stand esteja ao lado de um outro stand.</li>
                        <li>Ficha electrica tripla.</li>
                        <li>3 focos de luz.</li>
                        <li>Lettering com o nome da empresa.</li>
                        <li>2 mesas</li>
                        <li>2 cadeiras</li>
                        </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Stand 4 dias</td><td>3€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Stand 4 dias</h3>
                        <p>Possibilidade de colocar um stand durante o evento ou fora deste durante um dos eventos organizados pela SINFO, noutra data, dentro ou fora do Instituto Superior Técnico.
                        </p>
                        <li>Dimensões 3 x 3 x 2,5 metros</li>
                        <li>Alcatifado.</li>
                        <li>Parede atrás, e dos lados caso o stand esteja ao lado de um outro stand.</li>
                        <li>Ficha electrica tripla.</li>
                        <li>3 focos de luz.</li>
                        <li>Lettering com o nome da empresa.</li>
                        <li>2 mesas</li>
                        <li>2 cadeiras</li>
                        </div>
                          </td></tr>
                  </tr>
                  </tbody>
                </table>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="heading"><div class="toggle">+</div>Publicidade</div>
            <div class="content">
              <div class="indPackDescription">
                <table class="all-100">
                  <tbody>
                    <tr class="item">
                      <td><div class="toggle">+</div>Logo in our website</td><td>1€</td>
                            <tr class="description"><td colspan="2" class="noPadding">
                              <div class="shadow">
                                <h3>Logo in our website</h3>
                          <p>Logotipo no site na secção dos patrocinadores do evento.</p>
                        </div>
                            </td></tr>
                    </tr>
                    <tr class="item alternate">
                    <td><div class="toggle">+</div>Dar Workshop</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Dar Workshop</h3>
                              <p>Possibilidade de dar um Workshop a uma plateia de alunos que visitam o evento.</p>
                            </div>
                          </td></tr>
                    </tr>
                    <tr class="item">
                    <td><div class="toggle">+</div>Logo on folders</td><td>3€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Logo on folders</h3>
                        <p>Your company's logo will be included in the folders distributed for free during the event.<br>
                        The folders include the event program and informative documentation of participating companies.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Logo on posters</td><td>2€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Logo on posters</h3>
                        <p>The company's logo will be included in all posters posted at IST, other major colleges in our country and<br>
                        the advertising partners SINFO.</p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item">
                    <td><div class="toggle">+</div>Logo on banners</td><td>5€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Logo on banners</h3>
                        <p>The company's logo will be included in all banners that we have at campus gates as well as in several<br>
                        campus buildings.</p>
                        <p><small>Banner placed at the main entrance of the IST (at Alameda campus) in the nineteenth edition of SINFO.</small></p>
                      </div>
                          </td></tr>
                  </tr>
                  <tr class="item alternate">
                    <td><div class="toggle">+</div>Logo on placemats</td><td>4€</td>
                          <tr class="description"><td colspan="2" class="noPadding">
                            <div class="shadow">
                              <h3>Logo on placemats</h3>
                        <p>The company's logo will be placed in individual placemats.</p>
                        <p>Placemats will be placed in the week prior to the event and the week of the event at:</p>
                        <ul>
                          <li>All the IST canteens.</li>
                          <li>Other Lisbon universities' canteens.</li>
                        </ul>
                      </div>
                          </td></tr>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
					</div>

					<br><br>

					<h3>Benefits for the participating companies</h3>
					<ul>
						<li>The participants' <b>CVs</b>, for companies who purchased packages.</li>
						<li>Statistical data and opinions of visitors regarding the participation of the company, gathered from surveys carried out, during the event.</li>
						<li>Coffee-break for the company speakers.</li>
						<li>Company presentation slides can be made available, to the general public, in our website.</li>
					</ul>
				</div>
			</div>
			<div id="deadlines" class="column-group gutters">
				<div class="all-100">
					<h2>Deadlines</h2>
					<p>Confirmation of sponsorship: <b>until January 16</b>.</p>
					<p>All details about the sponsorship: <b>until February 14</b>.</p>
				</div>
			</div>

			<div id="more-information" class="column-group gutters">
				<div class="all-100">
					<h2>For more information</h2>
					<p>We'd be happy to answer any questions, requests for extra information or alternative small participation raised by reading this page. To do this, do not hesitate to contact us via this form</p>
				</div>
				<div class="all-100">
					<form class="ink-form" method="post" action="">
					    <div class="column-group gutters">
					        <div class="control-group all-40 small-100 tiny-100 <?if ($companyErr != '') { echo 'validation error'; }?> required">
					            <label for="company">Company or Entity</label>
					            <div class="control">
					                <input type="text" name="company" value="<? echo $company; ?>" id="required-company">
					            </div>
					            <p class="tip"><? echo $companyErr; ?></p>
					        </div>
					        <div class="control-group all-40 small-100 tiny-100 <?if ($emailErr != '') { echo 'validation error'; }?> required">
					            <label for="email">Email</label>
					            <div class="control">
					                <input type="text" name="email" value="<? echo $email; ?>" id="required-email">
					            </div>
					            <p class="tip"><? echo $emailErr; ?></p>;
					        </div>
					        <div class="control-group all-20 small-100 tiny-100">
					        	<button class="ink-button" type="submit" name="submit" value="submit">Button</button>
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>

	<footer>
	  <div class="ink-grid">
		  <div class="push-left all-50 small-100 tiny-100 small-push-left">
				<a href="http://tecnico.pt" target="_blank"><img src="img/logoist.png"></a>
		  </div>
		  <nav class="ink-navigation push-right medium-150 small-100 tiny-100 small-push-right">
			  <ul class="menu horizontal">
				<a class="social-icon" target="_blank" href="http://fb.com/sinfoist"><i class="social-icon fa fa-facebook"></i></a>
				<a class="social-icon" target="_blank" href="http://twitter.com/sinfo_ist"><i class="social-icon fa fa-twitter"></i></a>
				<a class="social-icon" target="_blank" href="http://youtube.com/sinfoist"><i class="social-icon fa fa-youtube"></i></a>
				<a class="social-icon" target="_blank" href="http://instagram.com/sinfo_ist"><i class="social-icon fa fa-instagram"></i></a>
				<a class="social-icon" target="_blank" href="http://github.com/sinfo"><i class="social-icon fa fa-github"></i></a>
				<a class="social-icon" target="_blank" href="mailto:geral@sinfo.org"><i class="social-icon fa fa-envelope"></i></a>
			  </ul>
		  </nav>
	  </div>

	  <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-49601832-1', 'sinfo.org');
		ga('send', 'pageview');

	  </script>
	</footer>
	</body>
</html>