<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coin_Solve extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->view('templates/header');
		$this->load->view('landing');
		$this->load->view('templates/footer');
	}


	public function render_page ( $page , $page_title ) 
	{
		if (  $this->ion_auth->logged_in() ) {

			$user_id = $this->ion_auth->get_user_id();

			$total_user_withdrawal_amount = $this->coin_solve_model->get_user_total_withdrawals( $user_id );

			$total_points_earned = $this->coin_solve_model->get_user_total_score($user_id);
			
			$total_points_from_referral = $this->coin_solve_model->get_user_total_score_from_referral($user_id);

			$user_referral_code = $this->coin_solve_model->get_user_referral_code($user_id);

			if( $user_referral_code ) $total_referrals = $this->coin_solve_model->count_user_referrals( $user_referral_code);

			else $total_referrals = 0;

			$data = array(
				'total_score' 			=> $total_points_earned,
				'total_referral_score' 	=> $total_points_from_referral,
				'page_title'			=> $page_title,
				'user_referral_code'	=> $user_referral_code,
				'total_referrals'		=> $total_referrals,
				'total_user_withdrawal_amount'	=> $total_user_withdrawal_amount/10000,
				'current_earnings_left'			=> ($total_points_earned-$total_user_withdrawal_amount)/10000,
				'minimun_withdrawal'	=> 2,
			);

			$this->load->view('templates/login-header', $data);
			$this->load->view( $page , $data);
			$this->load->view('templates/footer');
		}

		else redirect ( '' , 'refresh');
	}

	public function play () 
	{

		if ( $this->ion_auth->logged_in() ) 
		{	

			$user_id = $this->ion_auth->get_user_id();
			
			$total_score_count = $this->coin_solve_model->get_user_scores_count($user_id , 'App Game');

			if ( $total_score_count >= 5 ) {

				$pending_referrals = $this->coin_solve_model->get_pending_referrals($user_id);

				foreach ($pending_referrals->result() as $result) {
					
					if ( $this->coin_solve_model->update_pending_referral( $user_id ) ) {

						$user_id_of_referral = $this->coin_solve_model->get_user_id_from_referral_code ($result->referral_code);

						$total_referring_points_count = $this->coin_solve_model->get_user_scores_count($user_id , 'Referral Points');

						if ( $total_referring_points_count <= 5 ) $this->save_points_details( 500 , 'Referral Points' , $user_id_of_referral->user_id );

						else { $this->save_points_details( 20 , 'Referral Points' , $user_id_of_referral->user_id ); }

					}

				}

			}

			$data = array(
				'page_title'	=> 'page_play'
			);

			$this->render_page('play' , 'page_play');
		}
		else
		{
			redirect ( '' , 'refresh');
		}
	}


	public function account () {

		if ( $this->ion_auth->logged_in() ) 
		{	
			$data = array(
				'page_title'	=> 'page_account'
			);

			$this->render_page( 'account' , 'page_account');
		}
		else
		{
			redirect ( '' , 'refresh');
		}

	}

	public function dashboard ()
	{
		if ( $this->ion_auth->logged_in() ) 
		{
			$this->render_page( 'dashboard' , 'page_dashboard');
		}
		else
		{
			redirect ('' , 'refresh');
		}
	}

	public function get_user_points_history () {

		if ( $this->ion_auth->logged_in()) {

			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$scores = $this->coin_solve_model->get_user_scores( $this->ion_auth->get_user_id());

			$total_score_count = $this->coin_solve_model->get_user_scores_count( $this->ion_auth->get_user_id() );

			$data = array();

			foreach($scores->result() as $res) {

				$date = date("d M. Y  h:i a", strtotime($res->timestamp));

			   $data[] = array(
			        $date,
			        $res->score . ' point(s)',
			        $res->points_origin,
			   );
			}

			$output = array(
				"draw"				=> $draw,
				"recordsTotal"		=> $total_score_count,
				"recordsFiltered"	=> $total_score_count,
				"data" 				=> $data
			);

			echo json_encode($output);

			exit();

		}

	}

	public function get_user_referrals_history () {

		if ( $this->ion_auth->logged_in()) {

			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$user_referral_code = $this->coin_solve_model->get_user_referral_code($this->ion_auth->get_user_id());

			$referrals = $this->coin_solve_model->get_user_referrals( '' , $user_referral_code );

			$total_referral_count = $this->coin_solve_model->count_user_referrals( $this->ion_auth->get_user_id() );

			$data = array();

			foreach($referrals->result() as $res) {

				// get user info
				$user = $this->ion_auth->user($res->from_user_id)->row();

				if ( $res->referral_status == 'pending' ) $status = '<span class="text-danger">' . $res->referral_status . '</span>';

				else if ($res->referral_status == 'Activated' ) $status = '<span class="text-success">' . $res->referral_status . '</span>';

			   	$data[] = array(
			        $user->first_name . ' ' . $user->last_name,
			        $user->email,
			        $status,
			   	);
			}

			$output = array(
				"draw"				=> $draw,
				"recordsTotal"		=> $total_referral_count,
				"recordsFiltered"	=> $total_referral_count,
				"data" 				=> $data
			);

			echo json_encode($output);

			exit();

		}

	}

	public function get_user_withdrawals_history () {

		if ( $this->ion_auth->logged_in()) {

			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			$withdrawals = $this->coin_solve_model->get_user_withdrawals( $this->ion_auth->get_user_id() );

			$total_withdrawal_count = $this->coin_solve_model->count_user_withdrawals( $this->ion_auth->get_user_id() );

			$data = array();

			foreach($withdrawals->result() as $res) {

				if ( $res->withdrawal_status == 'Pending' ) $status = '<span class="text-danger">' . $res->withdrawal_status . '</span>';

				else if ($res->withdrawal_status == 'Activated' ) $status = '<span class="text-success">' . $res->withdrawal_status . '</span>';

				$withdrawal_details = json_decode($res->withdrawal_details);

				foreach ($withdrawal_details as $key => $value) {
					
					if ($key == 'select-payment' ) $type_of_payment = $value;

				}

				$date = date("d M. Y  h:i a", strtotime($res->timestamp));

			   	$data[] = array(
			        $date,
			        $type_of_payment,
			        '$'.$res->points_withdrawed / 10000,
			        $status,
			   	);
			}

			$output = array(
				"draw"				=> $draw,
				"recordsTotal"		=> $total_withdrawal_count,
				"recordsFiltered"	=> $total_withdrawal_count,
				"data" 				=> $data
			);

			echo json_encode($output);

			exit();

		}

	}

	public function save_points_details ( $score = 0, $points_origin = '', $user_id = 0) {

		if ( $this->ion_auth->logged_in() ) {

			if ( $score == 0 && $points_origin == '' && $user_id == 0 ) {
				
				$score = $this->input->post('score');
				$points_origin = $this->input->post('points_origin');
				$user_id = $this->ion_auth->get_user_id();
			}

			$save_game = $this->coin_solve_model->record_game_details( $score , $points_origin , $user_id );

			if ( $save_game ) return true;
		} 

		return false;
	}

	public function withdraw () {

		if ( $this->ion_auth->logged_in() ) {
			
			if ( $this->input->post('select-payment')) {

				$result = $this->coin_solve_model->add_withdrawal($this->ion_auth->get_user_id() ,  $this->input->post());

			}

			else $this->render_page('withdraw' , 'page_withdraw');

		}

	}
}
