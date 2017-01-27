module.exports = ->
	home = 
		controller: ["$scope", "$rootScope", ($scope, $rootScope)->
			$scope.scroll = ()->
				$rootScope.isScrolled = !$rootScope.isScrolled
				return
			prevTime = new Date().getTime()
			$scope.scrollWheel = ->
				curTime = new Date().getTime()
				if typeof prevTime isnt 'undefined'
					timeDiff = curTime - prevTime
					if timeDiff > 200      
						$scope.scroll()
				prevTime = curTime
				return
			$scope.scrollBack = ->
				return if $rootScope.currentPosX is null	
				$rootScope.isScrolled = false if $rootScope.currentPosX.absStartX == $rootScope.currentPosX.x
				return
			return
		]