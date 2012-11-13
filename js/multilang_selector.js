
$(function() {
	$(".lang_icon").live('click', function() {
		var selectedLang = $(this).attr('lang');
		
		$('.multifield').each(function(){
			var lang = $(this).attr('lang');
			//alert(lang);
			
			if(selectedLang == lang) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});
});

function showLangField(lang) {
	$('.multifield[lang="'+lang+'"]').show();
}

