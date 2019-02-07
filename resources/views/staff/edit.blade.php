@include('partials.notice')

<form action="{{ route('staff.update', $user) }}" method="post">
    @csrf
    @method('PUT')
    <div class="input">
        <input type="email" name="email" placeholder="Email address" value="{{ $user->email }}">
        @include('partials.form.error', ['field' => 'email'])
    </div>
    <div class="input">
        <select name="role">
            <option value="project_manager" {{ $user->role == 'project_manager' ?: 'selected' }}>Project manager</option>
            <option value="team_member" {{ $user->role == 'team_member' ?: 'selected' }}>Team member</option>
        </select>
        @include('partials.form.error', ['field' => 'role'])
    </div>
    <div class="input">
        <input type="text" name="first_name" placeholder="First name" value="{{ $user->staff->first_name }}">
        @include('partials.form.error', ['field' => 'first_name'])
    </div>
    <div class="input">
        <input type="text" name="last_name" placeholder="Last name" value="{{ $user->staff->last_name }}">
        @include('partials.form.error', ['field' => 'last_name'])
    </div>
    <div class="input">
        <input type="text" maxlength="10" name="phone" placeholder="Phone" value="{{ $user->staff->phone }}">
        @include('partials.form.error', ['field' => 'phone'])
    </div>
    <div class="input">
        <input type="password" name="password" placeholder="New password">
        <input type="password" name="password_confirmation" placeholder="Confirm password">
        @include('partials.form.error', ['field' => 'password'])
    </div>
    <button type="submit">create account</button>
</form>
