module.exports = ($timeout, $rootScope)->
	home =
		addClass : (element, className, done)->
			$rootScope.spliTl.reverse()
			TweenMax.to element, .5,
				paddingTop : "0vh"
				delay: .25
				onComplete : done
			return
		removeClass : (element, className, done)->
			TweenMax.to element,
				paddingTop : "100vh"
				onComplete : ->
					$rootScope.spliTl.reverse()
					done()
					return
			return

