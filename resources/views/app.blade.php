@extends('master-layout')

@section('content')
<div id="app">
	<App/>
</div>

<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection