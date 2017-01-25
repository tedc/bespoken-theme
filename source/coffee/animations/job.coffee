module.exports = ($window)->
	job =
		addClass : (element, className, done)->
			return if className isnt 'visible'
			w = angular.element $window
			content = element[0].querySelector '.job-content'
			TweenMax.set content,
				display: 'block'
			height = content.offsetHeight
			TweenMax.fromTo content, .5,
				{
					height: 0
				}
				{
					height: height
					onComplete : ->
						TweenMax.set content,
							height: "auto";
						done()
						return
				}
			TweenMax.to element, .5,
				height : "+=#{height}"
			w.on 'resize', ->
				return if not element.hasClass 'visible'
				height = content.offsetHeight
				h = element[0].offsetHeight + height
				TweenMax.to element,
					height : h
				return
			return
		removeClass : (element, className, done)->
			return if className isnt 'visible'
			content = element[0].querySelector '.job-content'
			height = content.offsetHeight
			TweenMax.fromTo content, .5,
				{
					height: height
				}
				{
					height : 0
				}
			TweenMax.to element, .5,
				height : "-=#{height}"
				onComplete : ->
					TweenMax.set [element, content],
						clearProps : 'all'
					done()
					return
			return