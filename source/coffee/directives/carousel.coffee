em = (val)->
	val/16
module.exports = ->
	carousel =
		scope : on
		controller : ["$scope", "$window", "$attrs", "$element", "$timeout", "$rootScope", ($scope, $window, $attrs, $element, $timeout, $rootScope)->		
			w = angular.element $window
			mouseMultiplier = .6
			firefoxMultiplier = 15
			container = $element[0].querySelector '.carousel-container'
			wrapper = container.querySelector '.carousel-wrapper'
			items = $scope.$eval $attrs.items
			max = $scope.$eval $attrs.max
			mw = $scope.$eval $attrs.mousewheel
			$scope.num = if mw then 1.2 else 1
			$rootScope.currentPosX = null
			if items > 1
				if Modernizr.mq "screen and (min-width: #{em(640)}em)"
					$scope.num = if mw then 2.2 else 2
				if Modernizr.mq "screen and (min-width: #{em(900)}em)"
					$scope.num = items
			width = if max > $scope.num then ( 100 / $scope.num ) * max else 100
			itemW = 100 / max
			TweenMax.set wrapper,
				width : "#{width}%"
			TweenMax.set wrapper.querySelectorAll('.carousel-item'),
				width : "#{itemW}%"
			$scope.isScrollable = off
			$scope.isPrev = off
			$scope.isNext = on
			prevBtn = angular.element $element[0].querySelector '.btn-prev'
			nextBtn = angular.element $element[0].querySelector '.btn-next'
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
						#useTransition : off
						bounce : off
				$scope.isScrolled = off
				$scope.carousel = new IScroll container, opts
				$scope.offset = 0
				$scope.prevTime = new Date().getTime()
				$scope.isScrolling = off
				$scope.scrollMove = (event, delta, deltaX, deltaY)->
					return if isMobile
					return if not $scope.isScrollable
					delta = if event.originalEvent.wheelDeltaY then event.originalEvent.wheelDeltaY else event.originalEvent.wheelDelta
					event.preventDefault() if deltaY > 0 and $scope.offset < 0
					event.preventDefault() if deltaY < 0
					event.preventDefault() if $scope.isScrolling
					if $scope.offset + delta < 0
						if $scope.offset + delta >= $scope.carousel.maxScrollX
							$scope.offset += delta
						else
							$scope.offset = $scope.carousel.maxScrollX
					else
						$scope.offset = 0
					TweenMax.killChildTweensOf wrapper
					TweenMax.to wrapper, 1.1,
						x : $scope.offset
						ease : Power2.easeOut
						onStart : ->
							$timeout ->
								$scope.isNext = if $scope.offset <= $scope.carousel.maxScrollX then off else on
								$scope.isScrolling = on if not $scope.isScrolling
								if delta < 0
									$scope.isPrev = if $scope.offset >= 0 then off else on
								return
							, 0	
							return
						onComplete : ->
							TweenMax.set wrapper,
								clearProps : 'x'
							$scope.carousel.scrollTo $scope.offset, 0, 0
							$timeout ->
								$scope.isScrolling = off if $scope.isScrolling
								$scope.isPrev = if $scope.offset >= 0 then off else on
							, 0
							return
					return

				$scope.carousel.on 'scrollEnd', ->
					$timeout ->
						$scope.isPrev = if $scope.carousel.x >= 0 then off else on
						$scope.isNext = if $scope.carousel.x <= $scope.carousel.maxScrollX then off else on
						return
					, 0
					return
				$scope.move = (cond)->
					if not mw
						if cond then $scope.carousel.next() else $scope.carousel.prev()
					else
						mover = $scope.carousel.wrapperWidth / $scope.num
						resto = if cond then mover - Math.abs($scope.carousel.x)%mover else Math.abs($scope.carousel.x)%mover 
						mover = if resto < mover / 2 then resto + mover else resto
						mv = if cond then -mover else mover
						if $scope.carousel.x + mv > 0
							if not cond
								TweenMax.to wrapper, 1.1,
									x : 0
									ease : Power2.easeOut
									onComplete : ->
										TweenMax.set wrapper,
											clearProps : 'x'
										$scope.carousel.scrollTo 0, 0, 0
										return
								$scope.offset = 0
						else if $scope.carousel.x + mv < $scope.carousel.maxScrollX
							if cond
								TweenMax.to wrapper, 1.1,
									x : $scope.carousel.maxScrollX,
									ease : Power2.easeOut
									onComplete : ->
										TweenMax.set wrapper,
											clearProps : 'x'
										$scope.carousel.scrollTo $scope.carousel.maxScrollX, 0, 0
										return
								$scope.offset = $scope.carousel.maxScrollX
						else
							TweenMax.to wrapper, 1.1,
								x : "+=#{mv}"
								ease : Power2.easeOut
								onComplete : ->
									TweenMax.set wrapper,
										clearProps : 'x'
									$scope.carousel.scrollBy mv, 0, 0
									return	
							$scope.offset += mv
						$scope.isPrev = if $scope.offset >= 0 then off else on
						$scope.isNext = if $scope.offset <= $scope.carousel.maxScrollX then off else on
						$scope.offset = $scope.carousel.x
					return
				w.on 'resize', ->
					$scope.num = if mw then 1.2 else 1
					if items > 1
						if Modernizr.mq "screen and (min-width: #{em(640)}em)"
							$scope.num = if mw then 2.2 else 2
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
				return
			, 20
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