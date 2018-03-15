jQuery(document).ready(function () {

    /* If there are required actions, add an icon with the number of required actions in the mts-welcome-page page -> Actions required tab */
    var mts_welcome_page_nr_actions_required = tiWelcomePageObject.nr_actions_required;

    if ( (typeof mts_welcome_page_nr_actions_required !== 'undefined') && (mts_welcome_page_nr_actions_required != '0') ) {
        jQuery('li.mts-welcome-page-w-red-tab a').append('<span class="mts-welcome-page-actions-count">' + mts_welcome_page_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".mts-welcome-page-required-action-button").click(function() {

        var id = jQuery(this).attr('id'),
            action = jQuery(this).attr('data-action');

        jQuery.ajax({
            type      : "GET",
            data      : { action: 'mts_welcome_page_dismiss_required_action', id: id, todo: action },
            dataType  : "html",
            url       : tiWelcomePageObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.mts-welcome-page-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + tiWelcomePageObject.template_directory + '/mts-welcome-page/images/ajax-loader.gif" /></div>');
            },
            success   : function (data) {
                location.reload();
                jQuery("#temp_load").remove();
                /* Remove loading gif */
            },
            error     : function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
    // Remove activate button and replace with activation in progress button.
    jQuery('.activate-now').live('DOMNodeInserted', function () {
        var activateButton = jQuery(this);
        if (activateButton.length) {
            var url = jQuery(activateButton).attr('href');
            if (typeof url !== 'undefined') {
                //Request plugin activation.
                jQuery.ajax({
                    beforeSend: function () {
                        jQuery(activateButton).replaceWith('<a class="button updating-message">' + tiWelcomePageObject.activating_string + '...</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        //Reload the page.
                        location.reload();
                    }
                });
            }
        }
    });
});