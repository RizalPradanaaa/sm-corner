<?php 

// function is_logged_in()
// {
//     $ci = get_instance();
//     if(!$ci->session->userdata('email')){
//         redirect('auth/login');
//     }else{
//         $role_id = $ci->session->userdata('role_id');
//         if($role_id == 1){
//             redirect('administrator');
//         }else if($role_id == 2){
//             redirect('admin'); 
//         }else{
//             redirect('notfound');
//         }
//     }
// }