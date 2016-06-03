@extends('admin_template') @section('content')
<p class="hidden">{{$page_title = ""}}</p>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<div class="error-page">
			<h2 class="headline text-yellow">404</h2>

			<div class="error-content">
				<br>
				<h3>
					<i class="fa fa-warning text-yellow"></i> Oops! Seite nicht
					gefundet.
				</h3>

				<p>
					Wir könnten die Seite nicht finden. Inzwischen können Sie zurück zu
					<a href="/">Startseite</a>
				</p>


			</div>
		</div>
	</section>
</div>
@endsection
