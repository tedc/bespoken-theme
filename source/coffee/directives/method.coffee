module.exports = ->
	method = 
		scope : on
		controller : ['$scope', '$attrs', '$element', '$timeout', ($scope, $attrs, $element, $timeout)->
			path = $attrs.basePath
			steps = $scope.$eval $attrs.methodSteps
			arcs = $element[0].querySelectorAll '.arc'
			$scope.isStep = 0
			$scope.isStarted = off
			length = 0
			tl = new TimelineMax
					paused : on
					repeat : -1
			$scope.inAnim = off
			angular.forEach arcs, (el, i)->
				length = el.getTotalLength()
				TweenMax.set el,
					strokeDasharray : "#{length} #{length}"
					strokeDashoffset : length
				tween1 = TweenMax.fromTo el, .5,
							{
								strokeDashoffset : length
							}
							{
								strokeDashoffset : 0
								onComplete : ->
									$timeout ->
										$scope.isStep = i
										return
									, 0
									return
							}
				tween2 = TweenMax.fromTo el, .5,
							{
								strokeDashoffset : 0
								strokeDasharray : "#{length} #{length}"
							}
							{
								strokeDashoffset : length * -1
								strokeDasharray : "0 #{length*2}"
								delay : .5
							}
				tl
					.add [tween1, tween2], "tween_#{i}"
				if i is steps
					close1 = TweenMax.fromTo "#arc_#{i + 1}", .5,
						{
							strokeDashoffset : length
						}
						{
							strokeDashoffset : 0
						}
					close2 = TweenMax.fromTo "#arc_#{i + 1}", .5,
								{
									strokeDashoffset : 0
									strokeDasharray : "#{length} #{length}"
								}
								{
									strokeDashoffset : length * -1
									strokeDasharray : "0 #{length*2}"
									delay : .5
								}
					tl
						.add [close1, close2], "tween_#{i + 1}"
				return
			tl.pause()
			stepLoop = (i, s)->
				d = i * 500
				$timeout ->
					$scope.isStep = s
					$scope.isAnim = off if s is steps
					return
				, d
				return
			$scope.goToStep = (step)->
				return if step is $scope.isStep
				return if $scope.inAnim
				$scope.isAnim = off
				if step > $scope.isStep
					stepTo = step + 1
					tl.tweenFromTo "tween_#{$scope.isStep + 1}", "tween_#{stepTo}"
				else
					toStart =
						onComplete : ->
							tl.tweenFromTo "tween_0", "tween_#{step + 1}"
					tl.tweenFromTo "tween_#{$scope.isStep + 1}", "tween_#{steps + 1}", toStart
				c = 0
				for i in [$scope.isStep..step]
					stepLoop(c, i)
					c += 1
				return
			return
		]