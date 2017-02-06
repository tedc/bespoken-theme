bspkn = angular.module 'bspkn'
bspkn
	.directive 'ngModal', require './menu.coffee'
	.directive 'ngCarousel', require './carousel.coffee'
	.directive 'ngAbout', [ require './split.coffee' ]
	.directive 'ngAnchors', [ require './anchors.coffee' ]
	.directive 'ngSlider', [ require './slider.coffee' ]
	.directive 'ngVideo', [ require './video.coffee' ]
	.directive 'ngPlayer', [ require './player.coffee' ]
	.directive 'ngSm', ["$rootScope", "$timeout", require './sm.coffee' ]
	.directive 'ngPs', ["$timeout", require './iscroll.coffee']
	.directive 'ngMethod', [ require './method.coffee']