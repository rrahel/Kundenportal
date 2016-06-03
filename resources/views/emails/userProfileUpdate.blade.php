<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>KundenPortal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body style="margin: 0; padding: 0;">
	<table align="center" cellpadding="0" cellspacing="0" width="600">
		<tr>
			<td><b>Benutzer: </b>{{$user->email}}, hat Profil Informationen
				aktualisiert:</td>
		</tr>

		<tr>
			<td style="padding: 20px 0 0 0;">Name: {{$user->name}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">Firma Name: {{$user->firma}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">Titel: {{$user->title}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">Addresse: {{$user->addresse}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">PLZ: {{$user->plz}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">UID: {{$user->uid}}
				<hr>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px 0 0 0;">Telefon: {{$user->tel}}
				<hr>
			</td>
		</tr>
	</table>
</body>
</html>