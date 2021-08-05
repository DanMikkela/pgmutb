$.fn.customFileInput = function () {
    var fileInput = $(this)
		.bind('change', function () {
		    var $fileName = $(this).val();
		    valArray = $fileName.split('\\');
		    newVal = valArray[valArray.length - 1];
		    var textField = $(this).parent('.customfile').find('.customfile-text-field');
		    $(textField).html(newVal);
		});

    return $(this);
};

$(document).ready(function (e) {
    $('.customfile-input').customFileInput();
});