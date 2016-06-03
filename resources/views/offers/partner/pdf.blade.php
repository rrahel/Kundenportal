<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee PHSP Agreement Form</title>

<style>
/* CSS Document */

/* =Reset default browser CSS. Based on work by Eric Meyer: http://meyerweb.com/eric/tools/css/reset/index.html
--additions by Ian Sebryk - www.sixintheclip.com
-------------------------------------------------------------- */
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p,
	blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn,
	em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup,
	tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label,
	legend, table, caption, tbody, tfoot, thead, tr, th, td {
	background: transparent;
	border: 0;
	margin: 0;
	padding: 4px;
	vertical-align: baseline;
	font-family: DejaVu Sans;
}
/* @font-face { */
/*   font-family: 'Firefly'; */
/*   font-style: normal; */
/*   font-weight: normal; */
/*   src: url(http://example.com/fonts/firefly.ttf) format('truetype'); */
/* } */
body {
	line-height: 1.25;
}

article, aside, canvas, details, figcaption, figure, footer, header,
	hgroup, menu, nav, section, summary {
	display: block;
	margin: 0;
	padding: 0;
}

h1, h2, h3, h4, h5, h6 {
	clear: both;
	font-weight: normal;
}

ol, ul {
	list-style: none;
}

blockquote {
	quotes: none;
}

blockquote:before, blockquote:after {
	content: '';
	content: none;
}

del {
	text-decoration: line-through;
}
/* tables still need 'cellspacing="0"' in the markup */
table {
	border-collapse: collapse;
	border-spacing: 0;
	width: 670px;
}

a {
	text-decoration: none;
}

a img {
	border: none;
}

/*---------------------------------------------------------------------------------------*/
@page {
	margin: 0;
}

body {
	/*background-color: RGB(190,180,140);*/
	color: rgb(7, 39, 54);
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	/* 	text-align: center; */
	margin: 6cm 1.25cm 2cm 2cm;
}

#conditions {
	line-height: 1;
}

.hilite {
	background-color: purple;
	color: white;
	padding: 2px 5px;
}

h1, h2, h3, h4, h5, h6 {
	font-weight: bold;
}

ol {
	list-style: decimal;
}

ul {
	list-style: disc;
	line-height: 10px;
}

ol li, ul li {
	margin-left: 20px;
	padding: 5px;
}

ol ol {
	margin-left: 20px;
	list-style: lower-alpha;
}

ol ol ul {
	margin-left: 20px;
	list-style: disc;
}

#content {
	text-align: left;
}

#pdfHeader, #pdfFooter {
	/* 	background-color: #eee; */
	position: fixed;
	width: 100%;
	overflow: hidden;
 	margin-left: -1.5cm;
	margin-top: -2cm;
}

#pdfHeader {
	/* background-image: url("header.png"); */
	top: 0cm;
	left: 0cm;
	height: 7cm;
}

#pdfHeader img {
 	margin: 68px 49px;
}

#pdfFooter {
	/* background-image: url('footer.png'); */
	bottom: 0cm;
 	left: 1cm;
	height: 2cm;
	text-align: right;
	padding-top: 0.5cm;
	font-size: 1.25em;
	
	
}
#pdfFooter img {
 	margin: 5px -7px;
}

#pdfFooter p {
	padding-right: 2cm;
}

#pdfFooter table {
	width: 100%;
	text-align: center;
}

.pb {
	page-break-after: always;
}

#frontPage {
	margin-top: 4in;
	text-align: center;
	font-size: 1.75em;
}

header {
	margin: 26px 0px 58px;
	/* width: 7.5in; */
	text-align: left;
}

/* section { */
/* 	margin: 10px 50px; */
/* } */
.indented {
	width: 4.5in;
	margin: 0 auto;
}

footer {
	text-align: left;
	margin: 30px auto;
	width: 6in;
}

table {
	border-collapse: separate;
}

caption {
	color: white;
	font-weight: bold;
}

#tableOfContents {
	font-size: 1.5em;
}

#tableOfContents tr td:nth-child(2) {
	padding-right: 20px;
	text-align: right;
}

th {
	/* 	background-color: slategrey; */
	color: white;
	text-align: center !important;
}

th, td {
	padding: 10px;
}

tr:nth-of-type(odd) {
	/* 	background-color: #eee; */
	
}

tr:nth-of-type(even) {
	/* 	background-color: #fff; */
	
}

.checkbox {
	border: 2px solid black;
	display: inline-block;
	width: 10px;
	height: 10px;
	margin: 5px 10px;
	float: left;
}

.toRight {
	text-align: right;
}

.toLeft {
	text-align: left;
}

.inline {
	display: inline;
}

sup {
	color: orange;
}

sub {
	color: purple;
}

.toc {
	line-height: 1.25;
	margin-top: 1.5in;
}

.toc ul, .toc ol {
	list-style: none;
}

.toc p {
	display: inline;
}

.toc ol li, .toc ul li {
	clear: both;
	text-align: right;
	font-size: 1.75em;
	text-transform: lowercase;
}

.toc span {
	float: left;
	text-transform: uppercase;
}

.footnotes {
	width: 6in;
	margin: 0 auto;
	text-align: left;
	font-size: 0.75em;
	line-height: 0.75;
	border: 1px solid slategrey;
	padding: 10px;
}

.footnotes h3 {
	/* 	background-color: slategrey; */
	color: white;
	line-height: 1;
}

img {
	width: 97%;
	height: auto;
}

.bottomLine {
	border-bottom: 1px solid black;
}

.topLine {
	border-top: 1px solid black;
}

b {
	padding: 0px;
}

.noPadding {
	padding: 0px;
}
</style>
</head>
<body>

	<div id="pdfHeader">
		<img src="{{asset("public/img/pdf/header.jpg")}}">
	</div>
	<div id="pdfFooter">
		<img src="{{asset("public/img/pdf/footer.jpg")}}">
	</div>


	<header class="contractSmall">
		<div id="tableBody">
			<table
				style='border-collapse: collapse; table-layout: fixed; width: 160px;'>

				<tr height=21 style='height: 15.75pt'>
					<td height=21 width=33 style='height: 15.75pt; width: 100pt'>
						{{$firma}}<br /> {{$kunde}}<br /> {{$stNr}}<br /> {{$plz}}
						{{$ort}}
					</td>



				</tr>
			</table>
		</div>
	</header>

	<section>
		<table>
			<tr>
				<td><b>Angebot</td>
				<td><b>Gültg</b></td>
				<td><b>Gratkorn</b></td>

			</tr>
			<tr>
				<td class="bottomLine" style="height: 25pt;">{{$angebotId}}</td>
				<td class="bottomLine" style="height: 25pt;">{{$validDate}}</td>
				<td class="bottomLine" style="height: 25pt;">{{$currentDate}}</td>
			</tr>
		</table>
		<table>
			<tr>
				<td class="bottomLine"><b>Menge</b></td>
				<td class="bottomLine"><b>Beschreibung</b></td>
				<td class="bottomLine toRight"><b>Einzelpreis</b></td>
				<td class="bottomLine toRight"><b>Steuern</b></td>
				<td class="bottomLine toRight"><b>Preis</b></td>
			</tr>
			@foreach ($checked as $check)
			<tr>
				<td class="bottomLine">{{$check->menge}}</td>
				<td class="bottomLine">{!! $check->beschreibung !!}</td>
				<td class="bottomLine toRight">{{number_format($check->einzelpreis,2,',','')}}</td>
				<td class="bottomLine toRight">{{$check->steuern}}%</td>
				<td class="bottomLine toRight">{{number_format($check->preis,2,',','')}}</td>
			</tr>
			@endforeach
			<tr>
				<td class="topLine">Netto</td>
				<td class="topLine"></td>
				<td class="topLine"></td>
				<td class="topLine"></td>
				<td class="topLine toRight">{{number_format($summe,2,',','')}}</td>
			</tr>
			<tr>
				<td class="bottomLine">{{$check->steuern}}%</td>
				<td class="bottomLine">Umsatzsteuer</td>
				<td class="bottomLine toRight">{{number_format($summe,2,',','')}}</td>
				<td class="bottomLine toRight">{{$check->steuern}}%</td>
				<td class="bottomLine toRight">{{number_format($steuern,2,',','')}}</td>
			</tr>
			<tr>
				<td class="bottomLine"><b>Total</b></td>
				<td class="bottomLine"></td>
				<td class="bottomLine"></td>
				<td class="bottomLine"></td>
				<td class="bottomLine toRight"><b>&euro;
						{{number_format($total,2,',','')}}</b></td>
			</tr>
		</table>
	</section>
	<dir class="pb"></dir>
	<section id="conditions">
		<p>
			<b>Rechnung und Zahlungskonditionen:</b>
		</p>

		<ul id="conditions">
			<li class="noPadding" type="circle">Abrechnung jährlich</li>
			<li class="noPadding" type="circle">Abrechnung monatlich (nur mit
				SEPA-Lastschrift möglich)</li>
		</ul>
		<p>Die Agentur wird vom Kunden die vertraglich geschuldete Vergütung
			in Rechnung stellen. Jede Rechnung ist vor Beginn des neuen
			Vertragsmonat bzw. Vertragsjahr zur Zahlung fällig.</p>

		<p>
			<b>Gewährleistung und Haftung:</b> Die Agentur ist für die Inhalte,
			die der Kunde bereitstellt, nicht verantwortlich. Insbesondere ist
			der Anbieter nicht verpflichtet, die Inhalte auf mögliche
			Rechtsverstöße zu ueberprüfen. Sollten Dritte die Agentur wegen
			möglicher Rechtsverstöße in Anspruch nehmen, die aus den Inhalten
			der Webseite resultieren, verpflichtet sich der Kunde, der Agentur
			von jeglicher Haftung gegenüber Dritten freizustellen und der
			Agentur die Kosten zu erstatten, die diesem wegen der möglichen
			Rechtsverletzung entstehen.<br /> Bei leichter Fahrlässigkeit haftet
			die Agentur nur bei Verletzung vertragswesentlicher Pflichten
			(Kardinalpflichten). Im übrigen ist die vorvertragliche,
			vertragliche und außervertragliche Haftung des Anbieters auf Vorsatz
			und grobe Fahrlässigkeit beschränkt, wobei die Haftungsbegrenzung
			auch im Falle des Verschuldens eines Erfüllungsgehilfen der Agentur
			gilt. Die Agentur übernimmt keinerlei Haftung für Änderungen durch
			Dritte welche notwendiger oder gewünschter Weise über Verwaltungs-
			& Zugangsdaten der Produkte verfügen. Arbeiten zur Korrektur von
			Änderungen durch Dritte oder den Kunden sind nicht im
			Wartungsvertrag inkludiert. Ausschlaggebend sind die von C.H.
			Werbedesign erstellte Kunden und Produktkonfiguration.
		</p>



		<p>
			<b>Laufzeit und Kündigung:</b> Hosting- und Wartungsverträge werden
			auf unbestimmte Zeit geschlossen. Die Mindestvertragsdauer beträgt
			ein Jahr. Der Vertrag kann nach Ablauf der Mindestvertragsdauer von
			beiden Parteien (Kunden & Agentur) durch schriftliche Erklärung
			gekündigt werden, und zwar mit einer Frist von zwei Monaten zum
			Datum der automatischen Vertragsverlängerung (jährlich). Das
			Kündigungsrecht aus wichtigem Grund bleibt den Pateien unbenommen.
			Ein wichtiger Grund zur Kündigung dieses Vertrages liegt für den
			Anbieter insbesondere vor, wenn:
		</p>


		<ul id="conditions">
			<li class="noPadding" id="conditions">Der Kunde seine Verpflichtungen
				gemäß der Vereinbarung dieses Vertrages und den AGB der Agentur
				nachhaltig verletzt.</li>
			<li class="noPadding" id="conditions">Der Kunde trotz Mahnung und
				Fristensetzung fällige Rechnungen unbeglichen lässt.</li>
			<li class="noPadding" id="conditions">Die Agentur Ihren Leistungen
				gemäß Wartungsvertrag nicht nachkommt (Erbringung gemäß AGB der
				Agentur).</li>
		</ul>


		<p>
			<b>Beginn der Vertragslaufzeit:</b>
		</p>


		<ul id="conditions">
			<li class="noPadding" id="conditions">Hosting: bei Bestellung</li>
			<li class="noPadding" id="conditions">Domänen: bei Registrierung
				oder Transfer</li>
			<li class="noPadding" id="conditions">Wartung: bei Go-Live oder 2
				Monate nach technischer Fertigstellung der Website lt. Angebot (nur
				Grundprojekt. Erweiterungs-Angebote zählen hier nicht dazu)</li>
		</ul>



	</section>
	<footer>
		<p>
			<b>Auftragserteilung:</b>
		</p>
		<br>
		<section>


			<pre>___________________________                  ___________________________</pre>
			<pre>Datum, Ort                                              Unterschrift, Stempel</pre>


		</section>
	</footer>
</body>
</html>
