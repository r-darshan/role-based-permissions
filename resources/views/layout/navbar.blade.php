<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
        @if (auth()->user()->hasRole('sub-admin'))
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
                @if(auth()->user()->hasAnyPermission(['products.create','products.read','products.delete','products.update']))
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Products
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @can('products.read')
                            <li><a class="dropdown-item" href="{{ route('products.index') }}">View All</a></li>
                        @endcan
                        @can('products.create')
                        <li><a class="dropdown-item" href="{{ route('products.create') }}">Create</a></li>
                        @endcan
					</ul>
				</li>
                @endif

                @can('transaction_histories.read')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transaction History
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('transactionhistory.index') }}">View All</a></li>
                        </ul>
                    </li>
                @endcan

				@can ('categories.read')
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Category
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="{{ route('categories.index') }}">View All</a></li>
					</ul>
				</li>
				@endcan
				<li class="nav-item">
					<a class="nav-link " href="{{ route('logout') }}" role="button">
					Logout
					</a>
				</li>
			</ul>
		</div>
        @else
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Category
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="{{ route('categories.index') }}">View All</a></li>
					</ul>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Products
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="{{ route('products.index') }}">View All</a></li>
						<li><a class="dropdown-item" href="{{ route('products.create') }}">Create</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					users
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="{{ route('users.index') }}">View All</a></li>
						<li><a class="dropdown-item" href="{{ route('users.create') }}">Create</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Transaction History
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="#">View All</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="{{ route('logout') }}" role="button">
					Logout
					</a>
				</li>
			</ul>
		</div>
        @endif
	</div>
</nav>