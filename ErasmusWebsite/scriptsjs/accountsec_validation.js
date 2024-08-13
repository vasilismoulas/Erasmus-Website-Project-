// AJAX request
var xhr = new XMLHttpRequest();
xhr.open('GET', 'scriptsphp/accountsec_validation.php', true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    if (response === 'true') {
      // Code to show the account link
      document.getElementById('account').style.display = 'block';
      document.getElementById('sign-up').style.display = 'none';
      document.getElementById('login').style.display = 'none';
    }
  }
};
xhr.send();

