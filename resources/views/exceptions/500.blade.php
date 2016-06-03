@extends('admin_template') @section('content')
<p class="hidden">{{$page_title = ""}}</p>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">

		<div class="error-page">
			<h2 class="headline text-red">500</h2>

			<div class="error-content">
				<br>
				<h3>
					<i class="fa fa-warning text-red"></i> Oops! Etwas ist schief
					gelaufen!
				</h3>

				<p>
					Wir arbeiten an der Behebung dieses Fehler. Inzwischen können Sie
					zurück zu <a href="/">Startseite</a>
				</p>


			</div>
		</div>

	</section>
</div>
@endsection
