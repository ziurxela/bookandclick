	$(document).ready(function() {
		var lang = "'" + detectarIdioma() + "'";
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2017-09-12',
			language: 'es',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'components/php/get-events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});

	});

function detectarIdioma()
{
	var language = navigator.language;
	if (language == null) {
		language = navigator.userLanguage;
		if (language == null)
			language = "en";
	}
	language = language.substring(0, 2);
	return language;
}