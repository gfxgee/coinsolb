<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Coin_solve extends CI_Controller  {

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

	public $data = [];

	public function meta_title_separator() {

		return '-';

	}

	public function index()
	{	
		$meta_description = 'Coinsolb makes math learning more exciting by turning it into a game anyone can play using their personal computer or mobile devices.';

		$this->render_page('landing' , 'Coinsolb' , 0 , $meta_description );
	}


	public function render_page ( $page , $page_title , $replay_time = 0 , $meta_description , $posts = [] , $message = []) 
	{
		if (  $this->ion_auth->logged_in() ) {

			$user_id = $this->ion_auth->get_user_id();

			$total_user_withdrawal_amount = $this->coin_solve_model->get_user_total_withdrawals( $user_id );

			$total_points_earned = $this->coin_solve_model->get_user_total_score($user_id);
			
			$total_points_from_referral = $this->coin_solve_model->get_user_total_score_from_referral($user_id);

			$user_referral_code = $this->coin_solve_model->get_user_referral_code($user_id);

			$user = $this->ion_auth->user($this->ion_auth->get_user_id())->row();

			$total_users = $this->coin_solve_model->get_total_user_count();

			$total_problems_solved = $this->coin_solve_model->get_all_games_count();

			if( $user_referral_code ) $total_referrals = $this->coin_solve_model->count_user_referrals( $user_referral_code);

			else $total_referrals = 0;

			if (isset($message['message'])) $msg = $message['message'];
			else $msg = NULL;

			$data = array(
				'page'							=> $page,
				'meta_description'				=> $meta_description,
				'total_score' 					=> $total_points_earned,
				'total_referral_score' 			=> $total_points_from_referral,
				'page_title'					=> $page_title,
				'user_referral_code'			=> $user_referral_code,
				'total_referrals'				=> $total_referrals,
				'total_user_withdrawal_amount'	=> $total_user_withdrawal_amount/10000,
				'current_earnings_left'			=> ($total_points_earned-$total_user_withdrawal_amount)/10000,
				'minimun_withdrawal'			=> 2,
				'user_info'						=> $user,
				'replay_time_left'				=> $replay_time,
				'posts'							=> $posts,
				'messages'						=> $msg,
				'user_count'					=> $total_users,
				'total_problems_solved'			=> $total_problems_solved,
			);

			
			if ($page == 'post' || $page == 'landing') {
				$data['recent_posts'] = $this->coin_solve_model->get_recent_posts();
			}

			$this->load->view('templates/header', $data);
			$this->load->view( $page , $data);
			$this->load->view('templates/footer');
		}

		else {

			$total_users = $this->coin_solve_model->get_total_user_count();

			$total_problems_solved = $this->coin_solve_model->get_all_games_count();


			$data = array(
				'page'					=> $page,
				'page_title'			=> $page_title,
				'user_count'			=> $total_users,
				'meta_description'		=> $meta_description,
				'posts'					=> $posts,
				'total_problems_solved'			=> $total_problems_solved,
				
			);

			if ($page == 'post' || $page == 'landing') {
				$data['recent_posts'] = $this->coin_solve_model->get_recent_posts();
			}

			$this->load->view('templates/header', $data);
			$this->load->view( $page , $data);
			$this->load->view('templates/footer');

		}
	}

	public function play () 
	{	

		$user_id = $this->ion_auth->get_user_id();

		$meta_description = 'Play to earn points while enhancing you math skills with Coinsolb and get some awesomes rewards from the points you earned.';

		if ( $this->ion_auth->logged_in() ) 
		{	
			
			if(isset($_COOKIE['score'])) {

				echo $_COOKIE['score'];

				$this->save_points_details( $_COOKIE['score'] , 'App Game' , $user_id );

			}

			$total_score_count = $this->coin_solve_model->get_user_scores_count($user_id , 'App Game');

			if ( $total_score_count >= 5 ) {

				$pending_referrals = $this->coin_solve_model->get_pending_referrals($user_id);

				foreach ($pending_referrals->result() as $result) {
					
					if ( $this->coin_solve_model->update_pending_referral( $user_id ) ) {

						$user_id_of_referral = $this->coin_solve_model->get_user_id_from_referral_code ($result->referral_code);

						$total_referring_points_count = $this->coin_solve_model->get_user_scores_count($user_id , 'Referral Points');

						if ( $total_referring_points_count <= 10 ) $this->save_points_details( 300 , 'Referral Points' , $user_id_of_referral->user_id );

						else { $this->save_points_details( 20 , 'Referral Points' , $user_id_of_referral->user_id ); }

					}

				}

			}


			if ( $this->coin_solve_model->get_latest_game_result( $user_id ) == NULL ) {
				
				$this->render_page('play' , 'CoinSolb - Play' , 3600 , $meta_description);

			} else {

				date_default_timezone_set("Asia/Manila");

				$current_date = new DateTime("now");

				$current_time = $current_date->getTimestamp();

				$last_game = strtotime($this->coin_solve_model->get_latest_game_result( $user_id )->timestamp);

				$offset = $current_time - $last_game;

				if ($this->ion_auth->is_admin()) $offset = 5000;

				$this->render_page('play' , 'Play '.$this->meta_title_separator().' CoinSolb' , $offset , $meta_description );

			}

		}
		else
		{
			redirect ( 'login' , 'refresh');
		}
	}


	public function account () {

		$this->load->library(['ion_auth', 'form_validation']);

		$this->data['title'] = $this->lang->line('edit_user_heading');

		if ( $this->ion_auth->logged_in() && !$this->ion_auth->is_admin() ) {
			$id = $this->ion_auth->get_user_id();
		}

		if ( $this->ion_auth->is_admin() ) {
			redirect('auth','refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();
			
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = [
					'first_name' => strip_tags($this->input->post('first_name')),
					'last_name' => strip_tags($this->input->post('last_name')),
					'company' => strip_tags($this->input->post('company')),
					'phone' => strip_tags($this->input->post('phone')),
				];

				// update the password if it was posted
				if (strip_tags($this->input->post('password')))
				{
					$data['password'] = strip_tags($this->input->post('password'));
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $id);
					
					$groupData = strip_tags($this->input->post('groups'));
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect ('dashboard' , 'refresh');

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect ('dashboard' , 'refresh');

				}

			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];
		
		$meta_description = 'Check out the lastest happening on your Coinsolb account here, from your earned points, withdrawals and more.';

		$this->render_page( 'dashboard' , 'Dashboard '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description );

	}

	public function dashboard ()
	{
		$meta_description = 'Check out the lastest happening on your Coinsolb account here, from your earned points, withdrawals and more.';

		if ( $this->ion_auth->logged_in() ) 
		{
			$this->render_page( 'dashboard' , 'Dashboard '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);
		}
		else
		{
			redirect ('login' , 'refresh');
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

				else if ($res->withdrawal_status == 'Accepted' ) $status = '<span class="text-success">' . $res->withdrawal_status . '</span>';

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

			if ( $this->coin_solve_model->get_latest_game_result( $user_id ) == NULL ) {
				
				$offset = 3600;

			} else {

				date_default_timezone_set("Asia/Manila");

				$current_date = new DateTime("now");

				$current_time = $current_date->getTimestamp();

				$last_game = strtotime($this->coin_solve_model->get_latest_game_result( $this->ion_auth->get_user_id() )->timestamp);

				$offset = $current_time - $last_game;
			}

			if ( $score == 0 && $points_origin == '' && $user_id == 0 && $offset >= 3600 ) {
				
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

		$meta_description = 'Convert your points to physical earnings. Coinsolb lets you choose variety of ways to do it.';

		if ( $this->ion_auth->logged_in() ) {
			
			if ( $this->input->post('select-payment')) {

				if ( $this->input->post('withdrawal-amount') >= 2 ) {

					$result = $this->coin_solve_model->add_withdrawal($this->ion_auth->get_user_id() ,  $this->input->post());

				}

				else $result = false;

				if ( $result ) {

					$data['message'] = true;

				}
				else {
					$data['message'] = false;
				}

				$this->render_page('withdraw' , 'Withdraw '.$this->meta_title_separator().' CoinSolb' , 0 , $meta_description , '' ,  $data );

			}

			else $this->render_page('withdraw' , 'Withdraw '.$this->meta_title_separator().' CoinSolb' , 0 , $meta_description );

		}
		else {
			redirect('login' , 'refresh');
		}

	}

	public function stats () {

		$meta_description = 'Check out the lastest happening on your Coinsolb account here, from your earned points, withdrawals and more.';

		if ( $this->ion_auth->logged_in() ) {

			$this->render_page('stats' , 'User Statistics '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

		}
		else {
			redirect('login' , 'refresh');
		}

	}

	public function points_history () {

		$meta_description = 'Check out the lastest happening on your Coinsolb account here, from your earned points, withdrawals and more.';

		if ( $this->ion_auth->logged_in() ) {

			$this->render_page('points-history' , 'Points History '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

		}
		else {
			redirect('login' , 'refresh');
		}

	}

	public function withdrawals () {

		$meta_description = 'Convert your points to physical earnings. Coinsolb lets you choose variety of ways to do it.';

		if ( $this->ion_auth->logged_in() ) {

			$this->render_page('withdrawals' , 'Withdrawals '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

		}
		else {
			redirect('login' , 'refresh');
		}

	}

	public function referrals () {

		$meta_description = 'Check out the lastest happening on your Coinsolb account here, from your earned points, withdrawals and more.';

		if ( $this->ion_auth->logged_in() ) {

			$this->render_page('referrals' , 'Referrals '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

		}
		else {
			redirect('login' , 'refresh');
		}

	}

	public function about () {

		$meta_description = 'Find out what is Coinsolb. Here you can check out how the application works and what are the things we can help you.';

		$this->render_page('about' , 'About Coinsolb '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description );

	}

	public function faq () {

		$meta_description = 'Do you have any question about Coinsolb? Here we answer all of the most frequently asked question and give you more details.';

		$this->render_page('faq' , 'Frequently Asked Questions about Coinsolb '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

	}

	public function contact () {

		$meta_description = 'For more personal concern and questions you can contact Coinsolb on this page.';

		$this->render_page('contact' , 'How you can contact Coinsolb '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

	}

	public function terms_conditions() {

		$meta_description = 'By getting to the site at Coinsolb.com, you are consenting to be bound by these terms and condition, every appropriate law, and guidelines, and concur that you are answerable for consistence with any relevant neighborhood laws.';

		$this->render_page('terms-conditions' , 'Terms and Conditions '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);

	}

	public function choose (){

		$meta_description = 'Choose your game to play and improve your skill in math.';

		$this->render_page('choose' , 'Choose Game '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);
	}

	public function privacy (){

		$meta_description = "Your Privacy is imperative to us. It is Coinsolb's strategy to regard your security with respect to any data we may gather from you over our site and different locales we possess and work.";

		$this->render_page('privacy' , 'Privacy Policy '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);
	}

	public function cookies (){

		$meta_description = "All information you need on what cookies are and why coinsolb needs to user cookies. Coinsolb also want you to know what are cookies function on this application.";

		$this->render_page('cookies' , 'Cookies Policy '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);
	}


	public function practice (){

		$meta_description = "Practice before playing to be prepared and earn more on CoinSolb. Answer without worrying about the time without limit for practice.";

		$this->render_page('practice' , 'Practice '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description);
	}

	public function discussions ($slug = "") {

		if ( $slug ) {

			$post = $this->coin_solve_model->get_post_by_id($slug);

			$meta_description = mb_strimwidth($post->post_content , 0 , 200 , '. . .');

			$this->render_page('post' , $post->post_title , 0 , $meta_description , $post );

		}

		else {

			$posts = $this->coin_solve_model->get_all_posts();

			$meta_description = 'Here are the discussion on the questions you have for Coinsolb.';

			$this->render_page('discussions' , 'Discussions '.$this->meta_title_separator().' Coinsolb' , 0 , $meta_description , $posts );
		}
	}
}

