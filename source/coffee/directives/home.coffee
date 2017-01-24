module.exports = ->
	home = 
		controller: ["$scope", "$rootScope", ($scope, $rootScope)->
			$scope.scroll = ()->
				$rootScope.isScrolled = !$rootScope.isScrolled
				return
			curTime = new Date().getTime()
			$scope.scrollWheel = ->
				if typeof prevTime isnt 'undefined'
	                timeDiff = curTime - prevTime
	                if timeDiff > 200      
	                    $scope.scroll()
                prevTime = curTime
                return
			return
		]