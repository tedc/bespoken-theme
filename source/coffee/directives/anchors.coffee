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
            prevTime = new Date().getTime()
            $scope.scrollToAnchor = (val)->
                curTime = new Date().getTime()
                if typeof prevTime isnt 'undefined'
                    timeDiff = curTime - prevTime
                    if timeDiff > 200
                        $scope.goToAnchor val
                prevTime = curTime
                return
            return
        ]