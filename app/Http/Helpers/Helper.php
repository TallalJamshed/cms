<?php
    use App\Lawcase;
    class Helper {

        public static function cardData() { 
            $today = date('Y-m-d');
            $nextday = date('Y-m-d',strtotime($today . "+1 days"));
            $data = array(
                "allcases" => Lawcase::where('case_status','!=','decided')->where('next_date','!<',date('Y-m-d'))->where('fk_user_id','=',Auth::id())->count(),
                "todaycases" => Lawcase::where('next_date','=',$today)->where('case_status','!=','decided')->where('fk_user_id','=',Auth::id())->count(),
                "nextdaycases" => Lawcase::where('next_date','=',$nextday)->where('case_status','!=','decided')->where('fk_user_id','=',Auth::id())->count(),
                "pendingcases" => Lawcase::where('next_date','<',date('Y-m-d'))->where('case_status','!=','decided')->where('fk_user_id','=',Auth::id())->count()
            );
            return $data;
        }
    }
?>