var navToggle = $('.navToggle');
navToggle.on('click', function() {
	this.addClass('is-active');
	console.log('hi')
	$('.nav-menu').addClass('is-active');
});
