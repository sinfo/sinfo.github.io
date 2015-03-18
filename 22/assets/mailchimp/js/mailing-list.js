/*///////////////////////////////////////////////////////////////////////
Ported to jquery from prototype by Joel Lisenby (joel.lisenby@gmail.com)
http://joellisenby.com

original prototype code by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/

jQuery(document).ready(function() {
        jQuery('#subscribe').submit(function() {
                // update user interface
                jQuery('#response').html('<span class="notice_message">Adding email address...</span>');
                 
                // Prepare query string and send AJAX request
                jQuery.ajax({
                        url: 'assets/mailchimp/inc/store-address.php',
                        data: 'ajax=true&email=' + escape(jQuery('#NewsletterEmail').val()),
                        success: function(msg) {
                                
                                if (msg.indexOf("Success") !=-1) {
                                        jQuery('#response').html('<span class="success_message">Success! You are now subscribed to our newsletter!</span>');
                                } else {
                                        jQuery('#response').html('<span class="error_message">' + msg + '</span>');
                                }
                        }
                });
        
                return false;
        });
});