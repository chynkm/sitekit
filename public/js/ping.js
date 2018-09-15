$(function() {
    APP.ping.init();
});

var APP = APP || {};

APP.ping = {
    submitButton: $('#submit'),
    outputDiv: $('#output'),
    ipHost: $('#ip_address_host'),

    init: function() {
        this.loadingButton();
        this.pingFormSubmit();
    },

    loadingButton: function() {
        var self = this;

        this.submitButton.click(function() {
            self.outputDiv.addClass('hidden');
            if(self.ipHost.val().length == 0) {
                swal('Oops!', 'Please enter an IP address or Hostname', 'error');
                return false;
            }
            $(this).button('loading');
            self.ping();
        });
    },

    ping: function() {
        var self = this;

        $.post( pingRoute, { host: this.ipHost.val() }).done(function( data ) {
            if(data.output == ''){
                swal('Sorry!', 'We were unable to ping the host', 'warning');
            } else {
                self.outputDiv.html(data.output).removeClass('hidden');
            }
            self.submitButton.button('reset');
        });
    },

    pingFormSubmit: function() {
        var self = this;

        $('#ping_form').submit(function(e) {
            e.preventDefault();
            self.submitButton.click();
            return false;
        });
    },

};
