module.exports = ->
	player = 
		scope : on
		controller : ['$scope', 'loadYoutubeApi', "$attrs", "$timeout", ($scope, loadYoutubeApi, $attrs, $timeout)->
			$scope.isPlaying = off
			$scope.isStarted = off
			$scope.isReady = off
			$scope.isPaused = off
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
					$scope.$on 'youtube.player.playing', ($event, player)->
						$timeout ->
							$scope.isPlaying = on
						, 0
					$scope.$on 'youtube.player.ready', ($event, player)->
						$timeout ->
							$scope.isReady = on
						, 0
					$scope.playPause = ()->
						if player.getPlayerState() is 1
							$scope.isPaused = off
						else
							$scope.isPaused = on
						return
					return
			return
		]