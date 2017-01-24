module.exports = ($timeout, $rootScope)->
	home =
		addClass : (element, className, done)->
			$rootScope.spliTl.reverse()
			TweenMax.to element.find('header'), .5,
				autoAlpha : off
				delay: .5
				onComplete : done
			TweenMax.staggerFrom '.carousel-item', .5,
				scaleX : 0.7
				delay: .75
			, .15
			return
		removeClass : (element, className, done)->
			TweenMax.to element,
				paddingTop : "100vh"
				onComplete : ->
					$rootScope.spliTl.play()
					done()
					return
			return

