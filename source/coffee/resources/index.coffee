bspkn = angular.module 'bspkn'
bspkn
	.service 'loadYoutubeApi', ['$window', '$q', ($window, $q)->
		deferred = $q.defer()
		loadJs = ->
			script = document.createElement 'script'
			script.id = 'ytApi'
			script.src = 'https://www.youtube.com/iframe_api'
			document.body.appendChild script
			deferred.resolve()
			return
		if $window.attachEvent
			$window.attachEvent 'onload', loadJs
		else
			$window.addEventListener 'load', loadJs, off
		return deferred.promise
	]
    .factory 'transformRequestAsFormPost', [ require './form.coffee']