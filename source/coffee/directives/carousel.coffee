module.exports = ->
	carousel =
		scope : on
		controller : ["$scope", "$element", "$attrs", ($scope, $element, $attrs)->
			carousel = new IScroll $element[0],
				scrollX : on
				scrollY : off
				snap : '.carousel-item'
			$scope.move = (cond)->
				if cond then $scope.carousel.next() else carousel.prev()
				return
			$scope.moveOnWheel = ($deltaY)->
				console.log $deltaY
				return
		]