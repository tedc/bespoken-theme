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
						console.log on
				prevTime = curTime
				return
			return
		]