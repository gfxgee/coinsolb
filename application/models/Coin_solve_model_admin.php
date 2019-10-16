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

	public function allscores_count() {

		$query = $this->db->get('admin_all_user');

		if ( $query->num_rows()>0 ) {

			return $query->num_rows();
		}
		else {
			return 0;
		}

	}

	public function allscores($limit,$start,$col,$dir) {

		$query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('admin_all_user');

		if ( $query->num_rows()>0 ) {

			return $query->result();
		}
		else {
			return NULL;
		}

	}

	public function score_search($limit,$start,$search,$col,$dir) {

		$query = $this
                ->db
                ->like('email',$search)
                ->or_like('first_name',$search)
                ->or_like('last_name',$search)
                ->or_like('user_id',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('admin_all_user');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }

	}

	public function score_search_count($search)
    {
        $query = $this
                ->db
                ->like('email',$search)
                ->or_like('first_name',$search)
                ->or_like('last_name',$search)
                ->or_like('user_id',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('admin_all_user');
    
        return $query->num_rows();
    } 

}
