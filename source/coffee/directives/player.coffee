module.exports = ->
	player = 
		controller : ['$scope', 'loadYoutubeApi', "$attrs", ($scope, loadYoutubeApi, $attrs)->
			loadYoutubeApi
				.then ->
					$scope.playerID
					return
			return
		]