<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div style="font-family:Helvetica,Arial,sans-serif;">
		<h1>Hey, {{{ $username }}}!  </h1>

        <img src="https://knowbrainer.be/img/logo/yv1.png" height="150px">

		<h3>Je hebt je zonet succesvol ingeschreven voor een van onze workshops.</h3>
		<p>We zetten de belangrijkste gegevens nog even op een rijtje:</p>

		<h3>Kom te weten{{{ $title }}}</h3>
        <p><strong>Beschrijving: </strong>{{{ $description }}}</p>
        <p><strong>Categorie: </strong>{{{ $category }}}</p>
        <p><strong>Locatie: </strong>{{ $location }}}</p>
        <p><strong>Max. aantal personen: </strong>{{ $subscribers_amount }}</p>
        <p><strong>Wanneer: </strong>{{ $date }}</p>
        <p><strong>Om hoe laat: </strong>{{ $time }}</p>
        <p><strong>Duur: </strong>{{ $duration }}</p>
        <p><strong>Benodigdheden: </strong>{{{ $requirements }}}</p>
        <p><strong>Voorkennis: </strong>{{{ $foreknowledge }}}</p>

		<p>Indien je jezelf terug wil uitschrijven gelieve dit te doen minstens 3 dagen voor de workshop.</p>
		<p>We zouden het super leuk vinden als je iets van jezelf kan geven aan de organistor van deze workshop.</p>
		<p>We raden je aan om eens een kijkje te nemen op hun profielpagin om interesses te achterhalen.</p>

		<p>Groetjes, het Know-brainer-team</p>
    </div>
	</body>
</html>