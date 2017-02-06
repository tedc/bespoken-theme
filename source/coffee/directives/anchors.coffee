module.exports = ->
    anchors =
        controller : ["$element", '$scope', "$document", ($element, $scope, $document)->
            $scope.goToAnchor = (val)->
                controller.scrollTo (newpos)->
                    TweenMax.to window, 1, 
                        scrollTo : 
                            y : newpos
                    return
                controller.scrollTo val
                return
            return
        ]