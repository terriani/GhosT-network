//Rotas de autenticação geradas automaticamente via Scooby_CLI em 19-11-19 - 00:07:am
$route["/back"] = "/home";
$route["/login"] = "/user/index";
$route["/register"] = "/user/register";
$route['/new-user'] = '/user/saveUser';
$route['/make-login'] = '/user/login';
$route["/exit"] = "/user/exit";
$route["/password-rescue"] = "/user/newPass";
$route["/passwordRescue"] = "/user/passwordRescue";
$route["/create-password"] = "/user/saveNewPassword";
$route['/password-reset'] = '/user/passwordReset';

//Rotas Autenticadas
if(Helpers\Auth::authValidation()){
    $route['/dashboard'] = '/user/loged';
    $route['/delete-user'] = '/user/deleteUser';
    $route['/alter-user'] = '/user/alterUser';
    $route['/update-user'] = '/user/updateUser';
}