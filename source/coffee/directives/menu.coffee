module.exports = ->
	menu = 
		link : (scope, element, attrs)->
			text = element.text()
			html = '<span class="btn-menu-text-content">'
			for i in text
				html += "<span class='letter'>#{i}</span>"
			html += '</span>'
			element.empty().prepend(html).append(html)
			return