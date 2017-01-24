module.exports = ->
	splitTitle =
		link : (scope, element, attrs)->
			split = new SplitText element,
				type : 'chars,words'
			if attrs.kind is 'home'
				TweenMax.staggerFrom split.chars, .25,
					y : "-100%"
					rotationX : 180
				, .05
			return
