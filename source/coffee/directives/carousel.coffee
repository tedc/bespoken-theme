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
			$scope.isScrollable = off
			$scope.isPrev = off
			$scope.isNext = on
			$timeout ->
				if not mw
					opts =
						preventDefault: off
						scrollX: on
						scrollY: off
						snap: '.carousel-item'
				else
					opts = 
						preventDefault: off
						eventPassthrough: on
						scrollX: on
						scrollY: off
						#mouseWheel : mw
						bindToWrapper : on
						bounce : off
				$scope.isScrolled = off
				$scope.carousel = new IScroll container, opts
				$scope.offset = 0
				$scope.scrollMove = (event, delta, deltaX, deltaY)->
					return if not $scope.isScrollable
					if $scope.offset + delta < 0
						if $scope.offset + delta > $scope.carousel.maxScrollX
							$scope.offset += delta
							$scope.isPrev = if $$scope.offset + delta >= 0 then off else on
							$scope.isNext = if $scope.offset + delta <= $scope.carousel.maxScrollX then off else on	
							$scope.carousel.scrollBy delta, 0
						event.preventDefault()
					return

				$scope.carousel.on 'scrollEnd', ->
					$timeout ->
						$scope.isPrev = if $scope.carousel.x >= 0 then off else on
						$scope.isNext = if $scope.carousel.x <= $scope.carousel.maxScrollX then off else on
						return
					, 0
					return
				return
			, 20
			$scope.move = (cond)->
				if not mw
					if cond then $scope.carousel.next() else $scope.carousel.prev()
				else
					mover = $scope.carousel.wrapperWidth / $scope.num
					resto = if cond then mover - Math.abs($scope.carousel.x)%mover else Math.abs($scope.carousel.x)%mover 
					mover = if resto < mover / 2 then resto + mover else resto
					mv = if cond then -mover else mover
					if $scope.carousel.x + mv > 0
						$scope.carousel.scrollTo 0, 0, 500 if not cond
					else if $scope.carousel.x + mv < $scope.carousel.maxScrollX
						$scope.carousel.scrollTo $scope.carousel.maxScrollX, 0, 500 if cond
					else
						$scope.carousel.scrollBy mv, 0, 500
					$scope.offset = $scope.carousel.x
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
				$scope.isPrev = if $scope.carousel.x >= 0 then off else on
				$scope.isNext = if $scope.carousel.x <= $scope.carousel.maxScrollX then off else on
				$scope.offset = $scope.carousel.x
				return
			if mw
				mwScene = new ScrollMagic.Scene 
					triggerElement : $element[0]
					triggerHook : 0	
				.addTo controller
				.on 'enter leave', (evt)->
					$timeout ->
						$scope.isScrollable = if evt.type is 'enter' then on else off
					, 0
					return 
			return
		]