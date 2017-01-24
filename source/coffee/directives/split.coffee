module.exports = ($timeout)->
	splitTitle =
		controller : ["$rootScope", "$element", "$attrs", ($rootScope, $element, $attrs)->
			$rootScope.split = new SplitText $element,
				type : 'chars,words'
			$rootScope.spliTl = new TimelineMax
				paused : true
				delay: .5
			if $attrs.kind is 'home'
				$rootScope.Tl.staggerFrom $rootScope.split.words, .5,
					y : "-100%"
				, .05
			Tl.play()
			return
		]
