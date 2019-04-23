//linguagem JAVASCRIPT

var url = "https://api.dev.hubsoft.com.br/oauth/token";
var data = {
	"grant_type":"password",
	"client_id":"3",
	"client_secret":"MIyaO4nwOy8lM3R2H1M3zpXmo1K4ZkYR7sYAZKHw",
	"username":"api.hub@norteline.com.br",
	"password":"86d6a126475d6eb18bfee8e1a2bfe6f0"
};
  
$.ajax({
  type: "POST",
  url: url,
  data: data,
  success: success,
  error: error
});

function success(response){
  var alerta = 'SUCESSO ---- TOKEN TYPE: ' + response.token_type + ' | ACCESS TOKEN: ' + response.access_token;
  
  alert(alerta);
}

function error(){
   alert('error');
}