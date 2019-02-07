@include('partials.notice')

<div class="container">
    @each('staff.partials.list', $users, 'user', 'staff.partials.list_empty')
</div>
