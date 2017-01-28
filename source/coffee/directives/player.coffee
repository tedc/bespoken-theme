module.exports = ->
	player = 
		scope : on
		controller : ['$scope', 'loadYoutubeApi', "$attrs", "$timeout", ($scope, loadYoutubeApi, $attrs, $timeout)->
			$scope.isPlaying = off
			$scope.isStarted = off
			$scope.isReady = off
			$scope.isPaused = off
			progressTimeout = null
			onProgress = (player)->
				console.log player.getCurrentTime()
				progressTimeout = $timeout ->
					onProgress(player)
				, 20
				return
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
							$scope.isPaused = off
						, 0
						onProgress(player)
						return
					$scope.$on 'youtube.player.paused', ($event, player)->
						$timeout ->
							$scope.isPaused = on
						, 0
						$timeout.cancel( progressTimeout )if progressTimeout isnt null

						return
					$scope.$on 'youtube.player.ended', ($event, player)->
						$timeout.cancel( progressTimeout )if progressTimeout isnt null
						return
					$scope.$on 'youtube.player.ready', ($event, player)->
						$timeout ->
							$scope.isReady = on
						, 0
						return
					$scope.playPause = (player)->
						if player.getPlayerState() is 1
							player.pauseVideo()
						else
							player.playVideo()
						return
					return
			return
		]