<div class="user-card" data-id="{{ $user->id }}">
    @if(Auth::guard('webadmin')->check())
    <a href="{{ route('view-user-admin', ['username' => $user->username]) }}">
    @else
    <a href="{{ route('user', ['username' => $user->username]) }}">
    @endif
        @if($user->profile_picture)
        <img src="{{stream_get_contents($user->profile_picture)}}"/>
        @else
        <img src="{{ url('assets/profile-picture.png') }}"/>
        @endif

        <span class="card-info">
            {{ $user->name }}
            <span class="username">&#64;{{$user->username}}</span>
        </span>
    </a>

    @if(isset($group) && !$owners && Auth::user() instanceof App\Models\User && $group->isOwner(Auth::user()))
        <div class="remove-member">
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <span class="material-symbols-outlined">
                logout
            </span>
        </div>
    @elseif (isset($group) && isset($owners) && $owners && Auth::user() instanceof App\Models\User && $group->isOwner(Auth::user()))
        <div class="remove-owner">
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <span class="material-symbols-outlined">
                logout
            </span>
        </div>
    @endif

</div>