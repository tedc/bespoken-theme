module.exports = ($timeout)->
	splitTitle =
		controller : ["$element", ($element)->
			words = $element[0].querySelectorAll('.word')
			tl = new TimelineMax
				repeat : -1
			tween = TweenMax.staggerTo words, 0.5, 
					autoAlpha : on
					repeat :  1
					yoyo : on
					repeatDelay:  1
				, 0.5 + 1
			tl.append tween
			return
		]
