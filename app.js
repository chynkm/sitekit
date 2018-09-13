$(function() {
    APP.sitekit.init();
});

var APP = APP || {};

APP.sitekit = {
    submitButton: $('#submit'),
    outputDiv: $('#output'),

    init: function() {
        this.loadingButton();
        this.pingFormSubmit();
    },

    loadingButton: function() {
        var self = this;

        this.submitButton.click(function() {
            var $btn = $(this).button('loading');
            self.ping();
        });
    },

    ping: function() {
        var self = this;

        $.getJSON('ping.php?host='+$('#ip_address_host').val(), function(data) {
            self.outputDiv.html(data.output);
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
