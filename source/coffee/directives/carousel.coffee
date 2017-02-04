em = (val)->
	val/16
module.exports = ->
	carousel =
		controller : ["$scope", "$window", "$attrs", "$element", "$timeout", "$rootScope", ($scope, $window, $attrs, $element, $timeout, $rootScope)->		
			w = angular.element $window
			container = $element[0].querySelector '.carousel-container'
			wrapper = container.querySelector '.carousel-wrapper'
			items = $scope.$eval $attrs.items
			max = $scope.$eval $attrs.max
			$scope.num = 1
			$rootScope.currentPosX = null
			if Modernizr.mq "screen and (min-width: #{em(640)}em)"
				$scope.num = 2
			if Modernizr.mq "screen and (min-width: #{em(900)}em)"
				$scope.num = items
			width = if max > $scope.num then ( 100 / $scope.num ) * max else 100
			itemW = 100 / max
			TweenMax.set wrapper,
				width : "#{width}%"
			TweenMax.set wrapper.querySelectorAll('.carousel-item'),
				width : "#{itemW}%"
			mw = $scope.$eval $attrs.mousewheel
			$timeout ->
				$scope.carousel = new IScroll container,
					preventDefault: off
					eventPassthrough: on
					scrollX: on
					scrollY: off
					snap: '.carousel-item'
					mouseWheelSpeed: 200
					bindToWrapper : on
				$scope.carousel.on 'scrollEnd', ->
					$scope.currentPosX = @
					return
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
				width = if max > $scope.num then ( 100 / $scope.num ) * max else 100
				itemW = 100 / max
				TweenMax.set wrapper,
					width : "#{width}%"
				TweenMax.set wrapper.querySelectorAll('.carousel-item'),
					width : "#{itemW}%"
				$scope.carousel.refresh()
				return
			if mw
				mwScene = new ScrollMagic.Scene 
					triggerElement : $element[0]
					triggerHook : 0
				.addTo controller
				.on 'leave enter start end', (evt)->
					console.log evt
					if evt.type is 'start' and evt.scrollDirection is 'FORWARD' and evt.state is 'DURING'
						$scope.carousel.options.mouseWheel = on
						$scope.carousel.refresh()
						console.log $scope.carousel
					return
			return
		]