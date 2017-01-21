exports.up = ->
    (scope, element, attrs)->
        element.bind "DOMMouseScroll mousewheel onmousewheel", (event)->
            event = window.event || event
            delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)))
            if(delta > 0)
                scope.$apply ()->
                    scope.$eval attrs.ngMouseWheelUp
                    return
                event.returnValue = false
                event.preventDefault() if event.preventDefault
            return
exports.down = ->
    (scope, element, attrs)->
        element.bind "DOMMouseScroll mousewheel onmousewheel", (event)->
            event = window.event || event
            delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)))
            if(delta < 0)
                scope.$apply ()->
                    scope.$eval attrs.ngMouseWheelUp
                    return
                event.returnValue = false
                event.preventDefault() if event.preventDefault
            return
