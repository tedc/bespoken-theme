module.exports = ->
	player = 
		scope : on
		controller : ['$scope', 'loadYoutubeApi', "$attrs", "$timeout", "$element", ($scope, loadYoutubeApi, $attrs, $timeout, $element)->
			$scope.isPlaying = off
			$scope.isStarted = off
			$scope.isReady = off
			$scope.isHalf = off
			$scope.isPaused = off
			progressTimeout = null
			onProgress = (player)->
				TweenMax.to $element[0].querySelector('.progress-mask'), .5,
					width: "#{100 - timeToPercentage(player)}%"
				$scope.time = secondsToTime(player.getCurrentTime())
				$scope.isHalf = if timeToPercentage(player) >= 50 then on else off
				return if $scope.isPlaying = on or $scope.isPaused = on
				progressTimeout = $timeout ->
					onProgress(player)
				, 0
				return
			timeToPercentage = (player)->
				total = player.getDuration()
				current = player.getCurrentTime()
				value = Math.round ( current / total ) * 100
				return value
			secondsToTime = (time)->
				sec_num = parseInt(time, 10)
				hours   = Math.floor(sec_num / 3600)
				minutes = Math.floor((sec_num - (hours * 3600)) / 60)
				seconds = sec_num - (hours * 3600) - (minutes * 60)
				hours   = "0#{hours}" if hours < 10
				minutes = "0#{minutes}" if minutes < 10
				seconds = "0#{seconds}" if seconds < 10
				return "#{hours}:#{minutes}:#{seconds}"
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
						$timeout.cancel( progressTimeout ) if progressTimeout isnt null
						return
					$scope.$on 'youtube.player.ended', ($event, player)->
						$timeout.cancel( progressTimeout ) if progressTimeout isnt null
						progressTimeout = null
						$scope.isPlaying = off
						$scope.isPaused = on
						$scope.isHalf = off
						TweenMax.to $element[0].querySelector('.progress-mask'), .5,
							width: "100%"
						$scope.time = "00:00:00"
						return
					$scope.$on 'youtube.player.ready', ($event, player)->
						$timeout ->
							$scope.isReady = on
						, 0
						return
					$scope.skipTo = ($event, player)->
						progress = $element[0].querySelector('.progress-mask')
						max = player.getDuration()
						w = $event.target.offsetWidth
						x = $event.offsetX
						point = x / w
						val = Math.round ( max * point )
						player.seekTo val
						TweenMax.to progress, .5,
							width : "#{(point * 100)}%"
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