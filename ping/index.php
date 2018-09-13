<?php require_once('../header.php'); ?>
<div class="page-header text-center">
    <h1><?php echo $siteName; ?> - Ping</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-inline" id="ping_form" onsubmit="return function() { $('submit').click(); return false };">
            <div class="form-group">
                <label for="ip_address_host">IP address or Hostname</label>
                <input type="text" class="form-control ip_host_input" id="ip_address_host" autofocus placeholder="Enter IP address or Hostname">
            </div>
            <button type="button" class="btn btn-danger" id="submit" data-program="ping" data-loading-text="Pinging...">Ping</button>
        </form>
    </div>
</div>

<div class="row top_space_10">
    <div class="col-md-12" id="output">
    </div>
</div>
<?php require_once('../footer.php'); ?>
