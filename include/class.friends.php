<?php
    include "class.user.php";
    
    class Friends {
        static public function renderFriendShip($user_one, $user_two, $type){
            if(!empty($user_one) && !empty($user_two)){
                global $db;

                switch($type){
                    case 'requestPending':
                        $query = $db->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_officiel='0' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_officiel='0'");
                        $query->execute();

                        return $query->rowCount();
                        break;

                    case 'alreadyFriends': 
                        $query = $db->prepare("SELECT * FROM friends WHERE user_one='".$user_one."' AND user_two='".$user_two."' AND friendship_officiel='1' OR user_one='".$user_two."' AND user_two='".$user_one."' AND friendship_officiel='1'");
                        $query->execute(); 

                        return $query->rowCount();
                        break;
                }
            }
        }
    }