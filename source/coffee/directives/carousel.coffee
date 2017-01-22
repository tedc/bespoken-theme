em = (val)->
	val/16
module.exports = ->
	carousel =
		controller : ["$scope", "$window", "$$attrs", "$element", "$timeout", ($scope, $window, $$attrs, $element, $timeout)->
			w = angular.element $window
			wrapper = $element[0].querySelector '.carousel-wrapper'
			items = $scope.$eval $attrs.items
			max = $scope.$eval $attrs.max
			$scope.num = 1
			if Modernizr.mq "screen and (min-width: #{em(640)}em)"
				$scope.num = 2
			if Modernizr.mq "screen and (min-width: #{em(900)}em)"
				$scope.num = items
			width = ( 100 / $scope.num ) * max
			itemW = 100 / max
			TweenMax.set wrapper,
				width : width
			TweenMax.set wrapper.querySelectorAll '.carousel-item',
				width : itemW
			$timeout ->
				$scope.carousel = new IScroll wrapper,
					preventDefault: off
					eventPassthrough: on
					scrollX: on
					scrollY: off
					snap: '.carousel-item'
					mousewheel : $scope.$eval $$attrs.mousewheel
				return
			, 20
			$scope.move = (cond)->
				if cond then $scope.carousel.next() else $scope.carousel.prev()
				return
			w.on 'resize', ->
				$scope.num = 1
				if Modernizr.mq "screen and (min-width: #{em(640)}em)"
					$scope.num = 2
				if Modernizr.mq "screen and (min-width: #{em(900)}em)"
					$scope.num = items
				width = ( 100 / $scope.num ) * max
				itemW = 100 / max
				TweenMax.set wrapper,
					width : width
				TweenMax.set wrapper.querySelectorAll '.carousel-item',
					width : itemW
				$scope.carousel.refres()
				return
			return
		]