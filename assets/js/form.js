import "select2/dist/css/select2.min.css"
import "@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css"

import "select2";

(function($) {

    "use strict"; // Start of use strict

    $('select[data-autocomplete=true]').select2({
        tags: true,
        theme: 'bootstrap4'
    });

})(jQuery);