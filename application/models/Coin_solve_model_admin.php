<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_solve_model_admin extends CI_Model { 

	public function get_all_user_count(){

		$query = $this
                ->db
                ->get('users');
    
        return $query->num_rows(); 

	}

	public function get_all_withdrawal_count() {

		$query = $this
                ->db
                ->get_where('withdrawals' , array('withdrawal_status' => 'Pending'));
    
        return $query->num_rows(); 

	}

	public function get_all_games_played_count_today() {

		date_default_timezone_set("Asia/Manila");

		$current_date = date_format(new DateTime("now") , 'Y-m-d');
		$tomorrow_date = date_format(new DateTime("tomorrow") , 'Y-m-d');

		$this->db->where('timestamp BETWEEN "'.$current_date.'" AND "'.$tomorrow_date.'"' );

		$query = $this
                ->db
                ->get('game_details');
    
        return $query->num_rows(); 

	}

	public function get_all_games_played_count() {
		$query = $this
		        ->db
		        ->get('game_details');
    
        return $query->num_rows(); 
	}

	public function get_total_payable () {

		$this->db->select_sum('total_score');
		$this->db->where('total_score >=' , 20000);

		$query = $this
                ->db
                ->get('all_user');
    
        return $query->row()->total_score; 

	}

	public function get_total_users_earned () {
		
		$this->db->select_sum('score');

		$query = $this
                ->db
                ->get('game_details');
    
        return $query->row()->score; 

	}

	public function all_time_game_played() {

		$query = $this
                ->db
                ->get('game_details');
    
        return $query->num_rows(); 
	}

	public function get_total_withdrawed_amount() {

		$this->db->select_sum('points_withdrawed');

		$query = $this
                ->db
                ->get_where('all_detailed_withdrawals' , array('withdrawal_status' => 'Accepted'));
    
        return $query->row()->points_withdrawed; 
	}

}