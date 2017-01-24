module.exports = ($timeout, $rootScope)->
	home =
		addClass : (element, className, done)->
			$rootScope.spliTl.reverse()
			TweenMax.to element, .5,
				autoAlpha : off
				delay: .25
				onComplete : done
			TweenMax.staggerFrom '.carousel-item', .5,
				x : -50
				delay: .45
			, .15
			return
		removeClass : (element, className, done)->
			TweenMax.to element,
				paddingTop : "100vh"
				onComplete : ->
					$rootScope.spliTl.reverse()
					done()
					return
			return

