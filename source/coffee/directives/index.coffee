bspkn = angular.module 'bspkn'
bspkn
	.directive 'ngModal', require './menu.coffee'
	.directive 'ngCarousel', require './carousel.coffee'
	.directive 'ngMouseWheelUp', require( './mousewheel.coffee' ).up
	.directive 'ngMouseWheelDown', require( './mousewheel.coffee' ).down
	.directive 'ngSplitTitle', ["$timeout", require './split.coffee' ]
	.directive 'ngHome', [ require './home.coffee' ]
	.directive 'ngSlider', [ require './slider.coffee' ]
	.directive 'ngVideo', [ require './video.coffee' ]
	.directive 'ngPlayer', [ require './player.coffee' ]
	.directive 'ngSm', ["$rootScope", "$timeout", require './sm.coffee' ]