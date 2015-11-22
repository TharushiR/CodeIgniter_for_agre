<?php
require_once 'core/init.php';

if(Input::exists()){
    //if(Token::check(Input::get('token'))) {
    if(true){
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));

        if ($validation->passed()) {

            $user = new User();
            $salt = Hash::salt(32);

            try{
                $user->create(array(
                    //left side into database    right side get input field name="username"
                    'username'  => Input::get('username'),
                    'password'  =>  Hash::make(Input::get('password'), $salt),
                    'salt'      => $salt,
                    'email'     => Input::get('email'),
                    'address'      => Input::get('address'),
                    'joined'    => date("Y-m-d H:i:s"),
                    'gender'    => Input::get('gender'),
                    'groups'    => 1,
                    'user_approved'  => 2
                ));
            }catch (Exception $e){
                die($e->getMessage());
            }

            Session::flash('success', 'You have successfully registered.');
            Redirect::to('index.php');
        } else {
            $msg = '';
                foreach ($validation->errors() as $key){
                    //$msg=$msg.$key."\n";
                    $msg .='error! '.$key.'!<br>';
                }
            Session::flash('error', $msg);
            Redirect::to('index.php');
        }
    }
}

?>