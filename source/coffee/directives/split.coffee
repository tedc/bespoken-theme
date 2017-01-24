module.exports = ($timeout)->
	splitTitle =
		link : (scope, element, attrs)->
			split = new SplitText element,
				type : 'chars,words'
			Tl = new TimelineMax
				paused : true
			if attrs.kind is 'home'
				Tl.staggerFrom split.words, .5,
					y : "-100%"
				, .05
			lunch = ->
				Tl.play() if isLoaded	
				lunch() if not isLoaded
				return
			$timeout lunch, 100
			return
