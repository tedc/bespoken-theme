module.exports = ->
	carousel =
		scope : on
		controller : ["$scope", "$element", "$attrs", ($scope, $element, $attrs)->
			$scope.carousel = new IScroll $element[0].querySelector( '.carousel-wrapper' ),
				scrollX : on
				scrollY : off
				snap : '.carousel-item'
			$scope.isScrolling = off
			$scope.move = (cond)->
				return off if $scope.isScrolling
				if cond then $scope.carousel.next() else $scope.carousel.prev()
				return
			$scope.carousel.on 'scrollStart', ->
				$scope.isScrolling = on
				return
			$scope.carousel.on 'scrollEnd', ->
				$scope.isScrolling = off
				return
		]