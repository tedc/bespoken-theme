module.exports = ($rootScope)->
	scroll =
		link : (scope, element, attrs)->
			$rootScope.iScroll = []
			$rootScope.iScroll[attrs.iscrollElement] = new IScroll element[0], scope.$eval attrs.iscroll
			return