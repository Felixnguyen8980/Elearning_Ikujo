var reName = /^[\A-Za-z0-9_\.]{6,32}$/;
var rePass = /^([A-Z]){1}([\w_\.!@#$%^&*()]){5,31}$/;
function validate(){
	username = $('#username').val();
	password = $('#password').val();
	if ( !username.match(/^[\w\.]{6,32}$/) || !password.match(/^([A-Z]){1}([\w_\.!@#$%^&*()]){5,31}$/) ){
		$('#alertlogin').text("invalid username/password");
		return false;
	}
}