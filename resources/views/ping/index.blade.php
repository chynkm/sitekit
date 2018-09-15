@extends('layouts.base')

@section('content')
<div class="page-header text-center">
    <h1>{{ config('app.name', 'Laravel') }} - Ping</h1>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <form class="form-inline" id="ping_form">
            <div class="form-group">
                <label for="ip_address_host">IP address or Hostname</label>
                <input type="text" class="form-control ip_host_input" id="ip_address_host" autofocus placeholder="Enter IP address or Hostname">
            </div>
            <button type="button" class="btn btn-primary" id="submit" data-program="ping" data-loading-text="Pinging...">Ping</button>
        </form>
    </div>
</div>

<div class="row top_space_10">
    <div class="col-md-12">
        <pre id="output" class="hidden"></pre>
    </div>
</div>
@endsection

@section('js')
<script>
var pingRoute = "{{ route('ping.ping') }}";
</script>
<script type="text/javascript" src="{{ asset('js/ping.js') }}"></script>
@endsection
