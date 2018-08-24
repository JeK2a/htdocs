$(document).ready(function() {

    let $input = $form.find('input[type="file"]');
    let $label = $form.find('label');
    let showFiles = function (files) {
            $label.text(files.length > 1 ?
                ($input.attr('data-multiple-caption') || '').replace('{count}', files.length) :
                files[0].name);
        }

    // ...
    function upload_file(e) {
        e.preventDefault();
    }


    $(document).on('drop', function(e) {
        e.preventDefault();
        droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
        console.log(droppedFiles);
        // showFiles(droppedFiles);
    });

    //...

    $input.on('change', function(e) {
        showFiles(e.target.files);
    });

});