<?php

session_start();

require 'connection.php';

require 'router.php';

$conn['db'] = (new DB())->db;

$router = new Router();

$router->get('/registration','controllers/registration/register.php')->middlewares('guest');

$router->get('/registration-logic','controllers/registration/register-logic.php')->middlewares('auth');

$router->get('/login','controllers/login/login.php')->middlewares('guest');

$router->get('/login-logic','controllers/login/login-logic.php')->middlewares('guest');

$router->get('/','controllers/home.php')->middlewares('auth');

$router->get('/task','controllers/task.php')->middlewares('auth');

$router->get('/project','controllers/project.php')->middlewares('auth');

$router->post('/store','controllers/addproject.php')->middlewares('auth');

$router->post('/taskForm','controllers/task.php')->middlewares('auth');

$router->post('/taskStore','controllers/addtask.php')->middlewares('auth');

$router->post('/taskGet','controllers/list.php')->middlewares('auth');

$router->post('/decription','controllers/details.php')->middlewares('auth');

$router->post('/update','controllers/delete.php')->middlewares('auth');

$router->get('/logout','controllers/logout/logout.php')->middlewares('guest');

require $router->routes();

// function twoSum($nums, $target) {
//     $arr = [];
//     for($i=0;$i<count($nums);$i++){
//         for($j=$i+1;$j<count($nums);$j++){
//             if($nums[$i]+$nums[$j] == $target){
//               array_push($arr,$i.','.$j);
//             }
//         }

//     }

//     print_r($arr);
// }
// twoSum([2,7,11,15],9);

// function isPalindrome($x) {
//     if(gettype($x) != 'string'){
//         $c = (strval($x));
//     }
//  $a='';
// for($i=strlen($c)-1; $i>=0; $i--){
//     $a .= $c[$i];
// }
//  if($a == $x){
// return true;
//   }
//   else{
//  return false;
//   }
// }
// isPalindrome('malayalam') ;
// echo "kk";
