exports.up = ->
    (scope, element, attrs)->
        curTime = new Date().getTime()
        element.bind "DOMMouseScroll mousewheel onmousewheel", (event)->
            if typeof prevTime isnt 'undefined'
                timeDiff = curTime - prevTime
                if timeDiff > 200      
                    event = window.event || event
                    delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)))
                    if(delta > 0)
                        scope.$apply ()->
                            scope.$eval attrs.ngMouseWheelUp
                            return
                        event.returnValue = false
                        event.preventDefault() if event.preventDefault
            prevTime = curTime
            return
exports.down = ->
    (scope, element, attrs)->
        curTime = new Date().getTime()
        element.bind "DOMMouseScroll mousewheel onmousewheel", (event)->
            if typeof prevTime isnt 'undefined'
                timeDiff = curTime - prevTime
                if timeDiff > 200      
                    event = window.event || event
                    delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)))
                    if(delta < 0)
                        scope.$apply ()->
                            scope.$eval attrs.ngMouseWheelDown
                            return
                        event.returnValue = false
                        event.preventDefault() if event.preventDefault
            prevTime = curTime
            return
