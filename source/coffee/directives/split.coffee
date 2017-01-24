module.exports = ($timeout)->
	splitTitle =
		link : (scope, element, attrs)->
			split = new SplitText element,
				type : 'chars,words'
			Tl = new TimelineMax
				paused : true
				delay: .5
			if attrs.kind is 'home'
				Tl.staggerFrom split.words, .5,
					y : "-100%"
				, .05
			Tl.play()
			return
