bspkn = angular.module 'bspkn'
bspkn
	#.directive 'ngMenuText', require './menu.coffee'
	.directive 'ngCarousel', require './carousel.coffee'
	.directive 'ngMouseWheelUp', require( './mousewheel.coffee' ).up
	.directive 'ngMouseWheelDown', require( './mousewheel.coffee' ).down