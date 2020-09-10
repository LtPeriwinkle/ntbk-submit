function parse() {
    var md = window.markdownit('commonmark', {
        highlight: function (str, lang) {
	    if (lang && hljs.getLanguage(lang)) {
	        try {
	            return '<pre><code>' + hljs.highlight(lang, str, true).value + '</code></pre>';
		    } catch (_) {}
	    }

	    return "<pre><code>" + md.utils.escapeHtml(str) + '</code></pre>';
  	    },
	    breaks: true
    });
    if (window.location.href == "apexnotebook.ml/contribute") {
        var title = '# ' + document.getElementById('title').value;
        var date = document.getElementById('month').value + "/" + document.getElementById('date').value + "/" + document.getElementById('year').value;
        var subHead = document.getElementById('category').value + " by " + document.getElementById('contrib').value + " on " + date;
	    document.getElementById('preview').innerHTML = md.render(title).concat(md.render(subHead)).concat(md.render(document.getElementById('desc').value));
	} else {
        var inner = document.getElementById('preview').value;
        document.getElementById('preview').innerHtml = md.render(inner);
    }
}
