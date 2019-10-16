<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Coin_solve_model_admin extends CI_Model { 

	public function get_all_user_count(){

		$query = $this
                ->db
                ->get('users');
    
        return $query->num_rows(); 

	}

}
