bspkn = angular.module 'bspkn'
bspkn
	.animation '.job', [ "$window", require './job.coffee' ]