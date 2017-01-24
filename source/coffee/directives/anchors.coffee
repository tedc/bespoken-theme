module.exports = ->
    anchors =
        controller : ["$element", '$scope', "$document", ($element, $scope, $document)->
            $scope.goToAnchor = (val)->
                nav = $document[0].querySelector('.banner').offsetHeight
                lnd = $element[0].offsetHeight
                controller.scrollTo (newpos)->
                    TweenMax.to window, 1, 
                        scrollTo : 
                            y : newpos - nav - lnd
                    return
                controller.scrollTo val
                return
            return
        ]