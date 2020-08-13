function parse() {
	  var md = window.markdownit("commonmark", {
	    highlight: function (str, lang) {
		  if (lang && hljs.getLanguage(lang)) {
		    try {
		      return "<pre><code>" + hljs.highlight(lang, str, true).value + "</code></pre>";
			} catch (_) {}
		  }

		  return "<pre><code>" + md.utils.escapeHtml(str) + "</code></pre>";
	  	},
		breaks: true
	  });
	  console.log(md.render(document.getElementById('desc').value));
    var title = '## '.concat(document.getElementById('title').value);
	  document.getElementById('preview').innerHTML = md.render(title).concat(md.render(document.getElementById('desc').value));
	}
