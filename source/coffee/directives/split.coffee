module.exports = ($timeout)->
	splitTitle =
		controller : ["$element", ($element)->
			words = $element[0].querySelectorAll('.word')
			tl = new TimelineMax
				repeat : -1
			for i in [0..words.length - 1]
				next = if i < words.length - 1 then i + 1 else 0
				s = if i is 0 then 0 else 0.5 * i
				tween1 = TweenMax.to words[i], .5,
					autoAlpha : off
				tween2 = TweenMax.to words[next], .5,
					autoAlpha : on
				tl
					.add tween1, tween2
					, "+=#{s}s"
			return
		]
