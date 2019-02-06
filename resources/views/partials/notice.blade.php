@includeWhen(Session::has('success'), 'partials.alert.success', ['message' => Session::get('success')])

@includeWhen(Session::has('error'), 'partials.alert.error', ['message' => Session::get('error')])
