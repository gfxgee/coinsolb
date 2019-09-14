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

		return $this->db->get_where('referrals' , array('user_id' => $user_id))->row();

	}

	public function count_user_referrals ( $referral_code ){

		$query = $this->db->select("COUNT(*) as num")->get_where('referral_details' , array ( 'referral_code' => $referral_code ));
     	
     	$result = $query->row();
      	
      	if(isset($result)) return $result->num;
      	
      	return 0;

	}

	public function get_user_referrals ( $from_user_id = '' , $referral_code = '') {

		if ( $from_user_id != '' ) return $this->db->get_where('referral_details' , array('from_user_id' => $from_user_id));

		else return $this->db->get_where('referral_details' , array('referral_code' => $referral_code));
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

		$query= "insert into game_details values('','$user_id', '$score' , CURRENT_TIMESTAMP , '$points_origin')";
		
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

		return $this->db->get_where('game_details' , array('user_id' => $user_id));

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
}


 ?>