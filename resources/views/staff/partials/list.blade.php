<div class="staff">
    <a href="{{ route('staff.show', $user) }}">
        {{ ucwords($user->staff->full_name) }}
    </a>
    <form action="{{ route('staff.destroy', $user) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>
