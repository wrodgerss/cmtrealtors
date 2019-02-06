@include('partials.notice')

<form action="{{ route('staff.store') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Email address">
    <select name="role">
        <option value="admin"></option>
        <option value="project_manager"></option>
        <option value="team_member"></option>
    </select>
    <input type="text" name="first_name" placeholder="First name">
    <input type="text" name="last_name" placeholder="Last name">
    <input type="text" name="phone" placeholder="Phone">
    <button type="submit">create account</button>
</form>
