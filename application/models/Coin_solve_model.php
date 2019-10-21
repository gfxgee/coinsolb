<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Coin_solve_model extends CI_Model {

	public function generate_referral_code( $id ) {

	    $length = 10;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $code = '';    

	    for ($p = 0; $p < $length; $p++) {
	        $code .= $characters[mt_rand(0, strlen( $characters )-1)];
	    }

	    $validate_code = $this->check_user_referral_code( $code );

	    if ( $validate_code ) $this->generate_referral_code();

	    $data = array (
	    	'code'		=> $code,
	    	'user_id'	=> $id,
	    );

	   	$query = $this->db->insert('referrals' , $data );

	}

	public function get_all_games_count() {
		
		$query = $this
                ->db
                ->get('game_details');
    
        return $query->num_rows();  
	}

	public function check_user_referral_code ( $referral_code ) {

		$query = $this->db->select("COUNT(*) as num")->get_where('referrals' , array ( 'code' => $referral_code ));
     	
     	$result = $query->row();

     	if(isset($result)) return $result->num;
      	
      	return 0;

	}

	public function record_user_referral ( $user_id , $referral_code ){

		$data = array (
	    	'referral_code'		=> $referral_code,
	    	'from_user_id'		=> $user_id,
	    	'referral_status'	=> 'pending',
	    );

	   	$query = $this->db->insert('referral_details' , $data );

	}

	public function get_user_referral_code ( $user_id ){

		$query = $this->db->get_where('referrals' , array('user_id' => $user_id))->row();

		if ( isset($query->code) ) return $query->code;

		return false;
	}

	public function count_user_referrals ( $referral_code ){

		$query = $this->db->select("COUNT(*) as num")->get_where('referral_details' , array ( 'referral_code' => $referral_code ));
     	
     	$result = $query->row();
      	
      	if(isset($result)) return $result->num;
      	
      	return 0;

	}

	public function get_user_referrals ( $from_user_id = '' , $referral_code = '') {

		if ( $from_user_id != '' ) return $this->db->order_by('id' , 'DESC')->get_where('referral_details' , array('from_user_id' => $from_user_id));

		else return $this->db->order_by('id' , 'DESC')->get_where('referral_details' , array('referral_code' => $referral_code));
	}

	public function get_pending_referrals ( $from_user_id ) {

		return $this->db->get_where('referral_details' , array('from_user_id' => $from_user_id , 'referral_status' => 'pending'));

	}

	public function update_pending_referral ( $from_user_id ) {

		$data = array (
			'referral_status' => 'Activated', 
		);

		return $this->db->update('referral_details' , $data , array ('from_user_id' => $from_user_id ));

	}

	public function record_game_details ( $score , $points_origin , $user_id) {

		date_default_timezone_set("Asia/Manila");

		$current_date = new DateTime("now");

		$current_date = date('Y-m-d H:i:s' , $current_date->getTimestamp());

		if (isset($_SERVER['REMOTE_ADDR'])) $ip_address = $_SERVER['REMOTE_ADDR'];
		else $ip_address = '';

		$query = "insert into game_details values('','$user_id', '$score' , '$current_date' , '$points_origin' , '$ip_address' )";
		
		$result = $this->db->query($query);

		if ( $result ) return true;

		return false;

	}

	public function get_user_scores_count ( $user_id , $points_origin = '') {

		if ( $points_origin != '' ) $query = $this->db->select("COUNT(*) as num")->get_where('game_details' , array ( 'user_id' => $user_id , 'points_origin' => $points_origin ));
     	
		else $query = $this->db->select("COUNT(*) as num")->get_where('game_details' , array ( 'user_id' => $user_id ));

     	$result = $query->row();
      	
      	if(isset($result)) return $result->num;
      	
      	return 0;
	}

	public function get_user_scores ( $user_id ) {

		return $this->db->order_by('id' , 'DESC')->get_where('game_details' , array('user_id' => $user_id));

	}

	public function get_user_total_score ( $user_id ) {

		$total_score = 0;

		$result = $this->db->get_where('game_details', array('user_id' => $user_id));

		if ( $result ) {

			foreach ($result->result() as $user_score ) {
				
				$total_score = $total_score + $user_score->score;

			}

			return $total_score;

		}

		return false;
			
	}

	public function get_user_total_score_from_referral ( $user_id ) {

		$total_score = 0;

		$result = $this->db->get_where('game_details', array('user_id' => $user_id , 'points_origin' => 'Referral Points'));

		if ( $result ) {

			foreach ($result->result() as $user_score ) {
				
				$total_score = $total_score + $user_score->score;

			}

			return $total_score;

		}

		return false;
			
	}

	public function get_user_id_from_referral_code ( $referral_code ) {

		return $this->db->get_where('referrals' , array('code' => $referral_code))->row();

	} 

	public function check_pending_withdrawal ( $user_id ) {

		return $this->db->select("COUNT(*) as num")->get_where('withdrawals' , array ( 'user_id' => $user_id , 'withdrawal_status' => 'Pending' ))->row()->num;

	}

	public function add_withdrawal ( $user_id , $data ) {

		if ( !$this->check_pending_withdrawal( $user_id )) {

			date_default_timezone_set("Asia/Manila");

			$current_date = new DateTime("now");

			$current_date = date('Y-m-d H:i:s' , $current_date->getTimestamp());

			$amount = $data['withdrawal-amount']*10000;

			$data = json_encode($data);

			$query = "insert into withdrawals values('', '$amount' , '$current_date' , '$user_id' , '$data' , 'Pending' , '')";
			
			$result = $this->db->query($query);

			if ( $result ) return true;

			return false;
		}
		else return false;

	}

	public function get_user_total_withdrawals( $user_id ){

		return $this->db->select_sum('points_withdrawed')->get_where('withdrawals' , array ( 'user_id' => $user_id , 'withdrawal_status' => 'Accepted'))->row()->points_withdrawed;
	}

	public function get_user_withdrawals( $user_id ) {

		return $this->db->order_by('id' , 'DESC')->get_where('withdrawals' , array('user_id' => $user_id));

	}

	public function count_user_withdrawals ( $user_id ) {

		return $this->db->select("COUNT(*) as num")->get_where('withdrawals' , array ( 'user_id' => $user_id ))->row()->num;

	}

	public function get_total_user_count ( ) {

		return $this->db->count_all_results('users');

	}

	public function get_latest_game_result ( $user_id ) {

		return $this->db->order_by('timestamp', 'DESC')->get_where('game_details' , array('user_id' => $user_id , 'points_origin' => 'App Game'))->row();

	}

	public function get_all_posts ( ) {

		return $this->db->order_by('post_timestamp', 'DESC')->get('posts')->result();

	}
	public function get_recent_posts ( ) {

		return $this->db->order_by('post_timestamp', 'DESC')->limit(3)->get('posts')->result();

	}


	public function get_post_by_id ( $slug ) {

		return $this->db->get_where('posts' , array('post_slug' => $slug))->row();

	}

	public function check_milestone_ligibility( $user_id ) {

		$count = $this->db->get_where('game_details' , array('user_id' => $user_id , 'points_origin' => 'Milestone Points'))->num_rows();

		if ( $count == 0 ) {

			return true;
		}

		else {
			return false;
		}

	} 

}


 ?>