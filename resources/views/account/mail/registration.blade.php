@component('mail::message')
    # {{ config('app.name') }} Account Registration

    You have been registered as a **{{ $user->role }}**. Please proceed to setup your profile by clicking the button below.

    #### Account login credentials

    - Email address: **{{ $user->email }}**
    - Password: **secret**

    @component('mail::button', ['url' => route('staff.create')])
        Create Profile
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent