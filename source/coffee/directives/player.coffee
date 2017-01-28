module.exports = ->
	player = 
		controller : ['$scope', 'loadYoutubeApi', "$attrs", ($scope, loadYoutubeApi, $attrs)->
			loadYoutubeApi
				.then ->
					$scope.playerId = $attrs.player
					return
			return
		]