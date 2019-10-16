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
                ->get('withdrawals');
    
        return $query->num_rows(); 

	}

	public function get_all_games_played_count_today() {

		$query = $this
                ->db
                ->get('game_details');
    
        return $query->num_rows(); 

	}

	public function get_total_users_earned () {

		$this->db->select_sum('score');

		$query = $this
                ->db
                ->get('game_details');
    
        return $query->row()->score; 

	}

}
