$(function () {
    'use strict';
    var $documentTitle = $("#printDocumentTitle").text();

    if ($documentTitle != null) {
        document.title = $documentTitle;
    }
    window.print();
});
