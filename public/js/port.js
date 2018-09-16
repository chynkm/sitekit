$(function() {
    APP.port.init();
});

var APP = APP || {};

APP.port = {
    submitButton: $('#submit'),
    outputDiv: $('#output'),
    ipHost: $('#ip_address_host'),
    port: $('#port_number'),

    init: function() {
        this.loadingButton();
        this.checkPortNumber();
        this.portCheckFormSubmit();
    },

    loadingButton: function() {
        var self = this;

        this.submitButton.click(function(e) {
            e.preventDefault();
            self.outputDiv.addClass('hidden');
            if(self.ipHost.val().length == 0) {
                swal('Oops!', 'Please enter an IP address or Hostname', 'error');
                return false;
            }
            if(self.port.val().length == 0) {
                swal('Oops!', 'Please enter a port number', 'error');
                return false;
            }
            $(this).button('loading');
            self.portCheck();
        });
    },

    checkPortNumber: function() {
        this.port.focusout(function() {
            if(isNaN($(this).val())) {
                $(this).val('');
            }
        })
    },

    portCheck: function() {
        var self = this;

        $.post( portCheckRoute, { host: this.ipHost.val(), port: this.port.val() }).done(function( data ) {
            self.outputDiv.html(data.output).removeClass('hidden');
            self.submitButton.button('reset');
        });
    },

    portCheckFormSubmit: function() {
        var self = this;

        $('#port_check_form').submit(function(e) {
            e.preventDefault();
            self.submitButton.click();
            return false;
        });
    },

};
