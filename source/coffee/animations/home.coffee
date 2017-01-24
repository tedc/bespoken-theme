module.exports = ($timeout, $rootScope)->
	home =
		addClass : (element, className, done)->
			$rootScope.spliTl.reverse()
			TweenMax.to element.find('header'), .5,
				opacity : 0
				delay: 1
			$timeout ->
				TweenMax.set element.find('header'),
					visibility : 'hidden'
				done()
				return
			, 1500
			return
		removeClass : (element, className, done)->
			TweenMax.to element,
				paddingTop : "100vh"
				onComplete : ->
					$rootScope.spliTl.play()
					done()
					return
			return

