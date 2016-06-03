<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">Dienste</li>
			<!-- Optionally, you can add icons to the links -->

			<li><a href="{{ url('/bills') }}"><span>Rechnungen</span></a></li>
			<li class="treeview"><a href="#"><span>Vertrage</span> <i
					class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ url('/hostings') }}">Hosting</a></li>
					<li><a href="{{ url('/services') }}">Wartung</a></li>

				</ul></li> @role('Admin')
			<li class="treeview"><a href="#"><span>Angebote</span> <i
					class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ url('/hostingOffers') }}">Hosting</a></li>
					<li><a href="{{ url('/serviceOffers') }}">Wartung</a></li>
					<li><a href="{{ url('/partnerOffers') }}">Erstellte Angebote</a></li>
				</ul></li> @endrole @role('Admin')
			<li><a href="{{ url('/listUsers') }}"><span>Benutzer</span></a></li>@endrole
			@role('Partner')
			<li class="treeview"><a href="#"><span>Angebote</span> <i
					class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ url('/partnerOffers') }}">Erstellte Angebote</a></li>
					<li><a href="{{ url('/allOffers') }}">Neue Angebot erstellen</a></li>
				</ul> @endrole @permission('see_provisions')
			
			<li><a href="{{ url('/provisions') }}"><span>Provisionen</span></a></li>
			@endpermission
			<!-- 			info->changed name to downloads -->
			<li><a href="{{ url('/infos') }}"><span>Downloads</span></a></li>
		</ul>
	</section>
</aside>


