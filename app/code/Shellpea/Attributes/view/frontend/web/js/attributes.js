define([
    "jquery"
], function($){
        "use strict";
        return function(config, element) {
            // alert(config.message);
            var attributes = $(".data.table.additional-attributes").find(".col.label");
            console.log(attributes.length);
        }
    }
)
