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
    if (window.location.href == "https://apexnotebook.ml/contribute") {
        var title = '# ' + document.getElementById('title').value;
        var date = document.getElementById('date').value;
        var subHead = document.getElementById('cat').value + " by " + document.getElementById('name').value + " on " + date;
	    document.getElementById('preview').innerHTML = md.render(title).concat(md.render(subHead)).concat(md.render(document.getElementById('desc').value));
	} else {
        var inner = document.getElementById('raw').innerHTML;
        document.getElementById('preview').innerHTML = md.render(inner);
    }
}
