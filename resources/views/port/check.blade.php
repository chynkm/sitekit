@extends('layouts.base')

@section('content')
<div class="page-header text-center">
    <h1>{{ config('app.name', 'Laravel') }} - Port check</h1>
</div>
@include('partials.ipaddress')
<div class="row">
    <div class="col-md-12 text-center">
        <form class="form-inline" id="port_check_form">
            <div class="form-group">
                <label for="ip_address_host">IP address or Hostname</label>
                <input type="text" class="form-control ip_host_input" id="ip_address_host" autofocus placeholder="Enter IP address or Hostname">
            </div>
            <div class="form-group">
                <label for="ip_address_host">Port number</label>
                <input type="text" class="form-control" id="port_number" placeholder="Port number">
            </div>
            <button type="submit" class="btn btn-primary" id="submit" data-loading-text="Checking port status...">Check port</button>
        </form>
    </div>
</div>

<div class="row top_space_10">
    <div class="col-md-12 hidden" id="output">
    </div>
</div>
@endsection

@section('js')
<script>
var portCheckRoute = "{{ route('port.portCheck') }}";
</script>
<script type="text/javascript" src="{{ asset('js/port.js') }}"></script>
@endsection
