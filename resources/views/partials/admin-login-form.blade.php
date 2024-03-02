<form method="POST" action="{{ route('admin.login') }}">
    {{ csrf_field() }}

    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="E-mail" autofocus>
    @if ($errors->has('email'))
        <span class="error">
        {{ $errors->first('email') }}
        </span>
    @endif

    <input id="password" type="password" name="password" placeholder="Password" required>
    @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
    @endif

    <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>

    <button type="submit">
        Login
    </button>
    <a class="button button-outline" href="{{ route('register') }}">Register</a>
    @if (session('success'))
        <p class="success">
            {{ session('success') }}
        </p>
    @endif
</form>