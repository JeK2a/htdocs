// $(".modal").each( function(){
// // 	$(this).wrap('<div class="overlay"></div>')
// // });
// //
// // $(".open-modal").on('click', function(e){
// // 	e.preventDefault();
// // 	e.stopImmediatePropagation;
// //
// // 	var $this = $(this),
// // 		modal = $($this).data("modal");
// //
// // 	$(modal).parents(".overlay").addClass("open");
// // 	setTimeout( function(){
// // 		$(modal).addClass("open");
// // 	}, 350);
// //
// // 	$(document).on('click', function(e){
// // 		var target = $(e.target);
// //
// // 		if ($(target).hasClass("overlay")){
// // 			$(target).find(".modal").each( function(){
// // 				$(this).removeClass("open");
// // 			});
// // 			setTimeout( function(){
// // 				$(target).removeClass("open");
// // 			}, 350);
// // 		}
// //
// // 	});
// //
// // });
// //
// // $(".close-modal").on('click', function(e){
// // 	e.preventDefault();
// // 	e.stopImmediatePropagation;
// //
// // 	var $this = $(this),
// // 			modal = $($this).data("modal");
// //
// // 	$(modal).removeClass("open");
// // 	setTimeout( function(){
// // 		$(modal).parents(".overlay").removeClass("open");
// // 	}, 350);
// //
// // });

$(document).ready(function() {
    var dropZone = $('#dropZone'),
        maxFileSize = 1000000; // максимальный размер файла - 1 мб.
});


if (typeof(window.FileReader) == 'undefined') {
    dropZone.text('Не поддерживается браузером!');
    dropZone.addClass('error');
}


dropZone[0].ondragover = function() {
    dropZone.addClass('hover');
    return false;
};

dropZone[0].ondragleave = function() {
    dropZone.removeClass('hover');
    return false;
};

dropZone[0].ondrop = function(event) {
    event.preventDefault();
    dropZone.removeClass('hover');
    dropZone.addClass('drop');
}

var file = event.dataTransfer.files[0];

if (file.size > maxFileSize) {
    dropZone.text('Файл слишком большой!');
    dropZone.addClass('error');
    return false;
}