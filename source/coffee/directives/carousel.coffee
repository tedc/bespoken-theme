module.exports = ->
	carousel =
		scope : on
		controller : ["$scope", "$element", "$attrs", ($scope, $element, $attrs)->
			$scope.carousel = Draggable.create $element,
				type : 'x'
				bounds : 'body'
		]