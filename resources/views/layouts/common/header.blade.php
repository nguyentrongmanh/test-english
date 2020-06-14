<header class="header-area header-sticky">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="main-nav">
					<ul class="nav">
						<li class="scroll-to-section"><a href="{{ route('home')}}" class="active">Home</a></li>
						<li class="scroll-to-section"><a href="#features">About</a></li>
						<li class="scroll-to-section"><a href="{{ route('class') }}">Classes</a></li>
						<li class="scroll-to-section"><a href="{{ route('profile') }}">Profile</a></li>
						<li class="scroll-to-section"><a href="#contact-us">Contact</a></li>
						@php
						$currentUser = Auth::user();
						@endphp
						@if ($currentUser == null)
						<li class="scroll-to-section"><a href="{{ url('login') }}">Sign In</a></li>
						<li class="main-button"><a href="{{ url('register') }}">Sign Up</a></li>
						@else
						@if ($currentUser->role == 1)
						<li class="scroll-to-section"><a href="{{ url('/admin')}}">Admin</a></li>
						@endif
						<li class="main-button"><a href="{{ url('logout') }}">Log Out</a></li>
						@endif
					</ul>
					<a class='menu-trigger'>
						<span>Menu</span>
					</a>
				</nav>
			</div>
		</div>
	</div>
</header>