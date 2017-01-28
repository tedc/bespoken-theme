module.exports = ->
	player = 
		controller : ['$scope', 'loadYoutubeApi', "$attrs", ($scope, loadYoutubeApi, $attrs)->
			loadYoutubeApi
				.then ->
					$scope.video =
						id : $attrs.player
						player : null
						vars :
							controls : 0
							rel : 0
							modestbranding : 1
							showinfo : 0					
					return
			return
		]