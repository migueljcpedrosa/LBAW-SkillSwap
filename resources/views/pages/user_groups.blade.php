@extends(Auth::guard('webadmin')->check() ? 'layouts.appLoggedAdmin' : 'layouts.appLogged')

@section('title', 'User')

@section('content')

<div class="groups">
    @each('partials.group', $user->get_groups(), 'group')
</div>
@endsection
