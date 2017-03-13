function tab_login() {
    	$('ul.tabs').tabs('select_tab', 'login');
}

function tab_sign() {
    	$('ul.tabs').tabs('select_tab', 'signin');
}

$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});
  