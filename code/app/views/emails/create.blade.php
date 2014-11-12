<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div style="font-family:Helvetica,Arial,sans-serif;">
		<h1>Hey, {{{ $username }}}!  </h1>

        <img src="https://knowbrainer.be/img/logo/yv1.png" height="150px">

		<h3>Je hebt zonet succesvol een workshop aangemaakt.</h3>
		<h2>We vinden het fantastisch dat je je kennis wilt delen!</h2>
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

		<p>Indien je door omstandigheden de workshop toch niet kan geven dan kan je je workshop nog annuleren en een bericht meegeven aan de ingeschreven personen.</p>
		<p>Op het einde van de workshop krijg je mogelijk een bijdrage van de deelnemers van je workshop als teken van appreciatie.</p>
		<p>Alvast bedankt!</p>

		<p>Groetjes, het Know-brainer-team</p>

    </div>
	</body>
</html>