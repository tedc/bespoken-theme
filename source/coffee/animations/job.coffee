module.exports = ($window)->
	job =
		addClass : (element, className, done)->
			return if className isnt 'visible'
			w = angular.element $window
			row = element[0].querySelector '.job-row'
			content = element[0].querySelector '.job-content'
			TweenMax.set content,
				display: 'block'
			height = content.offsetHeight
			h = row.offsetHeight
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
			TweenMax.to row, .5,
				height : h + height
			w.on 'resize', ->
				return if not element.hasClass 'visible'
				height = content.offsetHeight
				h = row.offsetHeight + height
				TweenMax.to row,
					height : h + height
				return
			return
		removeClass : (element, className, done)->
			return if className isnt 'visible'
			row = element[0].querySelector '.job-row'
			content = element[0].querySelector '.job-content'
			height = content.offsetHeight
			h = row.offsetHeight
			TweenMax.fromTo content, .5,
				{
					height: height
				}
				{
					height : 0
				}
			TweenMax.to row, .5,
				height : h
				onComplete : ->
					TweenMax.set [element, content],
						clearProps : 'all'
					done()
					return
			return