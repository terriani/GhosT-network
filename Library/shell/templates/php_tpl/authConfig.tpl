<?php

/**
 * Array contendo as views que não passarão pela autenticação
 */
$notAutentication = [
    '404',
    'Home',
    'login',
    'register',
    'PasswordRescue',
    'NewPassword'
];

/**
 * Array contendo as views que passarão pela autenticação
 */
$autentication = [
    'DashBoard',
    'UpdateUser'
];

/**
 * Array de templates personalisados, neste array deve-se incluir o arquyivo que
 * contera um template personalizado, o template precisa ter o nome do arquivo etermiando com
 * template. ex: 'TesteTemplate' e o arquivo deve se chamar Teste.
 * Pagina sem autenticação
 */
$changeTemplate = [

];

/**
 * Array de templates personalisados, neste array deve-se incluir o arquyivo que
 * contera um template personalizado, o template precisa ter o nome do arquivo etermiando com
 * template. ex: 'TesteTemplate' e o arquivo deve se chamar Teste.
 * Pagina com autenticação
 */
$changeAuthTemplate = [
    
];
