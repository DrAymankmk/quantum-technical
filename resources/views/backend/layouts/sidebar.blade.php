  <!-- ========== Left Sidebar Start ========== -->
  <div class="leftside-menu">

  	<!-- LOGO -->
  	<a class="logo text-center" href="#">
  		<span class="logo-lg">
  			<i class="fas fa-laptop-code"></i> <span class="logo-text">Quantum Technical</span>
  		</span>
  		<span class="logo-sm">
  			<i class="fas fa-laptop-code"></i>
  		</span>
  	</a>

  	<!-- LOGO -->
  	<a class="logo text-center logo-dark">
  		<span class="logo-lg text-white">
  			Quantum Technical
  			<!-- <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="" height="16"> -->
  		</span>
  		<span class="logo-sm text-white">
  			Quantum Technical
  			<!-- <img src="{{asset('backend/assets/images/logo_sm_dark.png')}}" alt="" height="16"> -->
  		</span>
  	</a>

  	<div class="h-100" id="leftside-menu-container" data-simplebar="">

  		<!--- Sidemenu -->
  		<ul class="side-nav">



  			<!-- CMS Menu -->
  			<li class="side-nav-title side-nav-item">{{__('CMS')}}</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.languages.index') }}" class="side-nav-link">
  					<i class="uil-globe"></i>
  					<span>{{__('Languages')}}</span>
  				</a>
  			</li>

  			<li class="side-nav-item">
  				<a data-bs-toggle="collapse" href="#sidebarCmsPages" aria-expanded="false"
  					aria-controls="sidebarCmsPages" class="side-nav-link">
  					<i class="uil-file-alt"></i>
  					<span> {{__('Pages')}} </span>
  					<span class="menu-arrow"></span>
  				</a>
  				<div class="collapse" id="sidebarCmsPages">
  					<ul class="side-nav-second-level">
  						<li>
  							<a href="{{ route('cms.pages.index') }}">
  								<span>{{__('All Pages')}}</span>
  							</a>
  						</li>
  						<li>
  							<a href="{{ route('cms.pages.create') }}">
  								<span>{{__('Add Page')}}</span>
  							</a>
  						</li>
  					</ul>
  				</div>
  			</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.sections.index') }}" class="side-nav-link">
  					<i class="uil-layers"></i>
  					<span>{{__('Sections')}}</span>
  				</a>
  			</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.items.index') }}" class="side-nav-link">
  					<i class="uil-list-ul"></i>
  					<span>{{__('Items')}}</span>
  				</a>
  			</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.links.index') }}" class="side-nav-link">
  					<i class="uil-link"></i>
  					<span>{{__('Links')}}</span>
  				</a>
  			</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.media.index') }}" class="side-nav-link">
  					<i class="uil-image"></i>
  					<span>{{__('Media Library')}}</span>
  				</a>
  			</li>

  			<li class="side-nav-item">
  				<a href="{{ route('cms.translations.index') }}" class="side-nav-link">
  					<i class="uil-language"></i>
  					<span>{{__('Translations')}}</span>
  				</a>
  			</li>

  		</ul>




  		<!-- End Sidebar -->

  		<div class="clearfix"></div>

  	</div>
  	<!-- Sidebar -left -->
  </div>
  <!-- Left Sidebar End -->
