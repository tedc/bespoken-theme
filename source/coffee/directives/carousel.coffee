em = (val)->
	val/16
module.exports = ->
	carousel =
	controller : ["$scope", "$window", "$attrs", "$element", ($scope, $window, $attrs, $element)->
		w = angular.element $window
		$scope.isCurrent = 0
		$scope.mv = 0
		$scope.max = 0
		$scope.isAnim = off
		kind = if $attrs.kind then $attrs.kind else off
		$scope.move = (cond, max)->
			$scope.max = max + 1
			$scope.num = 1
			$scope.per = if cond then -1 else 1
			if not kind
				if Modernizr.mq "screen and (min-width: #{em(640)}em)"
					$scope.num = 2
				if Modernizr.mq "screen and (min-width: #{em(850)}em)"
					$scope.num = $attrs.items
			if cond
				return if $scope.isCurrent is 0
				$scope.mv -= $scope.num
			else
				return if max + 1 - $scope.isCurrent is $scope.num
				return if $scope.num > max
				$scope.mv += $scope.num
			$scope.isCurrent = if cond then (if $scope.isCurrent - $scope.num <= 0 then 0 else $scope.isCurrent - $scope.num) else (if $scope.isCurrent + $scope.num >= max then max else $scope.isCurrent + $scope.num)
			return if $scope.isAnim
			$scope.isAnim = on
			TweenMax.to $element[0].querySelectorAll('.carousel-item'), .5,
				x : "+=#{100*$scope.num*$scope.per}%"
				onComplete : ->
					$scope.isAnim = off
					return
		w.bind 'resize', ->
			$scope.num = 1
			return if kind is 'full'
			if Modernizr.mq "screen and (min-width: #{em(640)}em)"
				$scope.num = 2
			if Modernizr.mq "screen and (min-width: #{em(850)}em)"
				$scope.num = $attrs.items
			return if $scope.mv is 0
			x = if $scope.mv > $scope.max - $scope.num then ($scope.max - $scope.num)*100 else $scope.mv*100
			TweenMax.set $element[0].querySelectorAll('.carousel-item'),
				x : "-#{x}%"
			return
		return
	]