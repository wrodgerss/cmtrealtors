@include('partials.notice')

<form action="{{ route('staff.store') }}" method="post">
    @csrf
    <div class="input">
        <input type="email" name="email" placeholder="Email address">
        @include('partials.form.error', ['field' => 'email'])
    </div>
    <div class="input">
        <select name="role">
            <option value="project_manager">Project manager</option>
            <option value="team_member">Team member</option>
        </select>
        @include('partials.form.error', ['field' => 'role'])
    </div>
    <div class="input">
        <input type="text" name="first_name" placeholder="First name">
        @include('partials.form.error', ['field' => 'first_name'])
    </div>
    <div class="input">
        <input type="text" name="last_name" placeholder="Last name">
        @include('partials.form.error', ['field' => 'last_name'])
    </div>
    <div class="input">
        <input type="text" maxlength="10" name="phone" placeholder="Phone">
        @include('partials.form.error', ['field' => 'phone'])
    </div>
    <button type="submit">create account</button>
</form>
