bspkn = angular.module 'bspkn'
bspkn
	#.animation '.modal', [ "$rootScope", "$timeout", require './modal.coffee' ]
    .animation '.home-page', [ "$timeout", "$rootScope", require './home.coffee' ]