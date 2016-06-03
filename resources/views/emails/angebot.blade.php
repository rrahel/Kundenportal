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
			<td><b>Partner: </b>{{$user}}, <b>Ansprechpartner:</b> {{$kunde}}, <b>AngebotNr:</b> {{$angebotId}}</td>
		</tr>
		@foreach($checked as $check)
		<tr>
			<td style="padding: 20px 0 0 0;">{!! $check->beschreibung !!}
				<hr>
			</td>
		</tr>
		@endforeach
		<tr>
			<td><b>Total</b>€ {{$summe}}
				<hr></td>
		</tr>
		<tr>
			<td>
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td>Erstellt am: {{$currentDate}}</td>
						<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
						<td>Gültig bis: {{$validDate}}
					
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>