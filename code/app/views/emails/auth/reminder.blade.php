<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Wachtwoord Reset</h2>

		<div>
			Wijzig je wachtwoord via volgende link: <a href="{{ URL::to('password/reset', array($token)) }}">wachtwoord wijzigen</a>.<br/>
			Opgelet: deze link is slechts geldig tot {{ Config::get('auth.reminder.expire', 60) }} minuten na verzenden van deze mail.
		</div>
	</body>
</html>
