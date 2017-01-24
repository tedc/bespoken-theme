module.exports = ->
	splitTitle =
		link : (scope, element, attrs)->
			split = new SplitText element,
				type : 'chars'
			if attrs.kind is 'home'
				TweenMax.staggerFrom SplitText.chars, .5,
					y : "-100%"
					rotationY : 180
				, .15
			return
