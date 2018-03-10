@if(Auth::guard('web')->check())
	<p class="text-success">
		You are logged in as a <strong>User</strong>
	</p>
@else
	<p class="text-danger">
		Your are logged out as <strong>User</strong>
	</p>
@endif

@if(Auth::guard('admin')->check())
	<p class="text-success">
		You are logged in as a <strong>Admin</strong>
	</p>
@else
	<p class="text-danger">
		Your are logged out as <strong>Admin</strong>
	</p>
@endif