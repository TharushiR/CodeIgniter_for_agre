<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validation  = new Validation();
        $validation = $validation->check($_POST, array(
            'password_current' => array(
                'required'  => true,
                'min'       => 6
            ),
            'password_new' => array(
                'required'  => true,
                'min'       => 6
            ),
            'password_new_again' => array(
                'required'  => true,
                'min'       => 6,
                'matches'   => 'password_new'
            )
        ));

        if($validation->passed()){
            // change password
            if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
                echo 'Your Current Password is in-correct!';
            }else{
                $salt = Hash::salt(32);
                $user->update(array(
                    'password'  => Hash::make(Input::get('password_new'), $salt),
                    'salt'      => $salt
                ));

                Session::flash('success', 'Password changed successfully.');
                Redirect::to('index.php');
            }
        }else{
            pre($validation->errors());
        }
    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="password_current">Current Password</label>
        <input type="password" name="password_current" id="password_current"/>
    </div>

    <div class="field">
        <label for="password_new">New Password</label>
        <input type="password" name="password_new" id="password_new"/>
    </div>

    <div class="field">
        <label for="password_new_again">New Password again</label>
        <input type="password" name="password_new_again" id="password_new_again"/>
    </div>

    <input type="submit" value="Change"/>

    <input type="hidden" name="token" value="<?php echo Token::generate() ;?>"/>
</form>

<br>
<a href="index.php">Back</a>