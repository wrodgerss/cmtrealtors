@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @include('partials.notice')
                        @each('staff.partials.list', $users, 'user', 'staff.partials.list_empty')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
