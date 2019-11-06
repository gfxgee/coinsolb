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

	public function administrator ( $from = '' ) {

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

			$data = array(
				'page'						=> 'admin',
				'page_title'				=> 'Administrator',
				'user_count'				=> $this->coin_solve_model_admin->get_all_user_count(),
				'withdrawal_count'			=> $this->coin_solve_model_admin->get_all_withdrawal_count(),
				'games_played_count_today'	=> $this->coin_solve_model_admin->get_all_games_played_count_today(),
				'meta_description'			=> 'Administrator',
				'games_played_count'		=> $this->coin_solve_model_admin->get_all_games_played_count(),
				'get_total_users_earned'	=> $this->coin_solve_model_admin->get_total_users_earned(), 
				'all_time_game_played'		=> $this->coin_solve_model_admin->all_time_game_played(), 
				'get_total_payable'			=> $this->coin_solve_model_admin->get_total_payable()-$this->coin_solve_model_admin->get_total_withdrawed_amount(),
			);

			if ( $from == '' ) {
				$this->load->view('templates/header' , $data);
				$this->load->view('admin' , $data);
				$this->load->view('templates/footer');
			}

			if ( $from == 'realtime' ) echo json_encode($data);

		}

		else {
			redirect('/' , 'refresh');
		}

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
				'get_total_payable'				=> $this->coin_solve_model_admin->get_total_payable()-$this->coin_solve_model_admin->get_total_withdrawed_amount(),
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
				'total_problems_solved'	=> $total_problems_solved,
				'get_total_payable'		=> $this->coin_solve_model_admin->get_total_payable()-$this->coin_solve_model_admin->get_total_withdrawed_amount(),
				
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

		$meta_description = 'Play to earn points while enhancing you math skills with Coinsolb and get some awesomes rewards from the points you earned.';

		if ( $this->ion_auth->logged_in() ) 
		{	
			$user_id = $this->ion_auth->get_user_id();
			
			$total_user_withdrawal_amount = $this->coin_solve_model->get_user_total_withdrawals( $user_id );

			$total_score_count = $this->coin_solve_model->get_user_scores_count($user_id , 'App Game');

			if ( $total_score_count >= 4 ) {

				$pending_referrals = $this->coin_solve_model->get_pending_referrals($user_id);

				foreach ($pending_referrals->result() as $result) {
					
					if ( $this->coin_solve_model->update_pending_referral( $user_id ) ) {

						$user_id_of_referral = $this->coin_solve_model->get_user_id_from_referral_code ($result->referral_code);

						$total_referring_points_count = $this->coin_solve_model->get_user_scores_count($user_id_of_referral->user_id , 'Referral Points');

						if ( $total_referring_points_count <= 10 ) $this->save_points_details( 300 , 'Referral Points' , $user_id_of_referral->user_id );

						else { $this->save_points_details( 20 , 'Referral Points' , $user_id_of_referral->user_id ); }

					}

				}

			}

			$total_points_earned = $this->coin_solve_model->get_user_total_score($user_id);

			$milestone_ligible = $this->coin_solve_model->check_milestone_ligibility($user_id);

			if ( ($total_points_earned-$total_user_withdrawal_amount) >= 30000 && $milestone_ligible == true ) {

				$this->save_points_details( 20000 , 'Milestone Points' , $user_id );

			}


			if ( $this->coin_solve_model->get_latest_game_result( $user_id ) == NULL ) {
				
				$this->render_page('play' , 'CoinSolb - Play' , 3600 , $meta_description);

				if(isset($_COOKIE['score'])) {

					$this->save_points_details( $_COOKIE['score'] , 'App Game' , $user_id );

				}

			} else {

				date_default_timezone_set("Asia/Manila");

				$current_date = new DateTime("now");

				$current_time = $current_date->getTimestamp();

				$last_game = strtotime($this->coin_solve_model->get_latest_game_result( $user_id )->timestamp);

				$offset = $current_time - $last_game;

				if ( $offset >= 3600 ) {

					if(isset($_COOKIE['score'])) {

						$this->save_points_details( $_COOKIE['score'] , 'App Game' , $user_id ) ;

					}
				}

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

			$total_points_earned = $this->coin_solve_model->get_user_total_score($this->ion_auth->get_user_id());
			$total_user_withdrawal_amount = $this->coin_solve_model->get_user_total_withdrawals( $this->ion_auth->get_user_id());
			
			if ( $this->input->post('select-payment')) {

				if ( $this->input->post('withdrawal-amount') >= 2 && $this->input->post('withdrawal-amount') <= ($total_points_earned-$total_user_withdrawal_amount)/10000 ) {

					// var_dump($this->input->post());

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

	public function getLists(){

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

	        $data = $row = array();
	        
	        // Fetch member's records
	        $memData = $this->scores->getRows($_POST);
	        
	        if ( isset($_POST['start'])) $i = $_POST['start'];

	        foreach($memData as $member){

	            if ( $member->active == 1 ) {

	            	$link = base_url('auth/deactivate/').$member->user_id;

	            	$action = '<a href="'.$link.'" class="btn btn-danger rounded-100">Deactivate</a>';
	            }
	            else {
	            	$link = base_url('auth/activate/').$member->user_id;

	            	$action = '<a href="'.$link.'" class="btn btn-success rounded-100">Activate</a>';
	         
	            }
	            $data[] = array('<a href="'.base_url('user-details/').$member->user_id.'" class="link-primary">'.$member->first_name.' '.$member->last_name, $member->email.'</a>', $member->total_score, $member->user_id , $action);
	        }

	        if ( isset($_POST['draw']) ) $draw = $_POST['draw'];

	        else $draw = '';

	        $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $this->scores->countAll(),
	            "recordsFiltered" => $this->scores->countFiltered($_POST),
	            "data" => $data,
	        );
	        
	        // Output to JSON format
	        echo json_encode($output);
	    }

		else {
			redirect ('/' , 'refresh');
		}
	}

	public function getWithdrawalLists(){

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

	        $data = $row = array();
	        
	        // Fetch member's records
	        $memData = $this->withdrawals->getRows($_POST);
	        
	        if ( isset($_POST['start'])) $i = $_POST['start'];

	        foreach($memData as $member){

	            if ( $member->withdrawal_status == 'Pending' ) {

	            	$action = '<a href="'.base_url('approve-withdraw/').$member->id.'" class="btn btn-danger rounded-100 m-2">Approve</a><a href="'.base_url('decline-withdraw/').$member->id.'" class="m-2 btn btn-primary rounded-100">Decline</a>';
	            }
	            else {

	            	if ( $member->withdrawal_status == 'Accepted' ) {

	            		if ( $member->withdrawal_referrence_code == '') {

		            		$action = '<p class="text-success rounded-100">'.$member->withdrawal_status.'</p>';
		            		$action .= '<form id="withdrawal_form_'.$member->id.'" method="post" action="'.base_url('coin_solve/add_withdrawal_referrence_code/').$member->id.'"><input name="referrence_code" class="p-2 col-sm-9 px-3 add-referrence-code" placeholder="Enter Referrence Code" /><button type="submit" class="rounded-100 btn bg-transparent text-white border-white"><i class="far fa-paper-plane"></i></button>';
	            		}

	            		else {

		            		$action = '<p class="text-success rounded-100">'.$member->withdrawal_status.'</p>';
	            			$action .= '<p class="fs-14"> Referrence Code: <br><span class="fs-22 text-highlights">'.$member->withdrawal_referrence_code.'</p></span>';
	            		}
	            	}

	            	else {
	            		$action = '<p class="text-danger rounded-100">'.$member->withdrawal_status.'</p>';
	            	}
	         
	            }

	            $withdrawal_details = json_decode($member->withdrawal_details);

	            $details = '';

	           foreach ($withdrawal_details as $key => $value) {
					
					if ( $value != '' ) $details .= '<span class="fs-14">'.$key.':</span> <br><span class="text-uppercase text-highlights">'.$value . '</span></br>'; 

					if ( $key == 'withdrawal-amount' ) $amount = '<span class="text-highlights">$'.$value.'</span>';

				}

	            $withdrawal_date = date("d M. Y  h:i a", strtotime($member->timestamp));

	            $date_created = date("d M. Y  h:i a", $member->created_on);

	            $user_details = 'Name: <span class="text-highlights">'.$member->first_name.' '.$member->last_name.'</span><br>';
	            $user_details .= 'Email: <span class="text-highlights">'.$member->email.'</span><br>';
	            $user_details .= 'Sign Up Date: <span class="text-highlights">'.$date_created.'</span>';


	            $data[] = array( $user_details ,  $withdrawal_date , $details, $amount , $action);
	        }

	        if ( isset($_POST['draw']) ) $draw = $_POST['draw'];

	        else $draw = '';

	        $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $this->withdrawals->countAll(),
	            "recordsFiltered" => $this->withdrawals->countFiltered($_POST),
	            "data" => $data,
	        );
	        
	        // Output to JSON format
	        echo json_encode($output);
	    }

		else {
			redirect ('/' , 'refresh');
		}
	}

	public function approve_withdrawal ( $id ) {

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

			$result = $this->withdrawals->approve_withdraw( $id );

			if ( $result ) {

				redirect('administrator' , 'refresh');

			}
			else {

				echo 'Approval failed <a href="'.base_url('administrator').'">go back here</a>.';
			}

		}

	}
	public function decline_withdrawal ( $id ) {

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

			$result = $this->withdrawals->decline_withdraw( $id );

			if ( $result ) {

				redirect('administrator' , 'refresh');

			}
			else {

				echo 'Approval failed <a href="'.base_url('administrator').'">go back here</a>.';
			}

		}

	}


	public function getPointsLists( $id ){

		if ( $this->ion_auth->logged_in() ) {

			$this->load->model('points');


	        $data = $row = array();
	        
	        // Fetch member's records
	        $memData = $this->points->getRows($_POST , $id );
	        
	        if ( isset($_POST['start'])) $i = $_POST['start'];

	        foreach($memData as $member){


	           $member->timestamp = date("d M. Y  h:i a", strtotime($member->timestamp));

	            
	            $data[] = array($member->timestamp, $member->score, $member->points_origin );
	        }

	        if ( isset($_POST['draw']) ) $draw = $_POST['draw'];

	        else $draw = '';

	        $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $this->points->countAll( $id ),
	            "recordsFiltered" => $this->points->countFiltered($_POST , $id),
	            "data" => $data,
	        );
	        
	        // Output to JSON format
	        echo json_encode($output);
	    }

		else {
			redirect ('/' , 'refresh');
		}
	}


	public function getPlayerWithdrawalsLists( $id ){

		if ( $this->ion_auth->logged_in()) {

			$this->load->model('player_withdrawals');

	        $data = $row = array();
	        
	        // Fetch member's records
	        $memData = $this->player_withdrawals->getRows($_POST , $id );
	        
	        if ( isset($_POST['start'])) $i = $_POST['start'];

	        foreach($memData as $member){

	            
            	if ( $member->withdrawal_status == 'Accepted' ) {

            		$action = '<p class="text-success rounded-100">'.$member->withdrawal_status.'</p>';
            		$action .= '<p class="fs-14"> Referrence Code: <br><span class="fs-22 text-highlights">'.$member->withdrawal_referrence_code.'</p></span>';
            	}

            	else if ( $member->withdrawal_status == 'Pending' ) {

            		$action = '<p class="text-warning rounded-100">'.$member->withdrawal_status.'</p>';
            	}

            	else {
            		$action = '<p class="text-danger rounded-100">'.$member->withdrawal_status.'</p>';
            	}
	        

	            $withdrawal_details = json_decode($member->withdrawal_details);

	            $details = '';

	           foreach ($withdrawal_details as $key => $value) {

	           		if ( $key == 'select-payment') $type_of_payment = $value; 
					
					if ( $key == 'withdrawal-amount' ) $amount = '<span class="text-highlights">$'.$value.'</span>';

				}

	            $withdrawal_date = date("d M. Y  h:i a", strtotime($member->timestamp));

	            $data[] = array( $withdrawal_date , $type_of_payment, $amount , $action );
	        }

	        if ( isset($_POST['draw']) ) $draw = $_POST['draw'];

	        else $draw = '';

	        $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $this->player_withdrawals->countAll( $id ),
	            "recordsFiltered" => $this->player_withdrawals->countFiltered($_POST , $id ),
	            "data" => $data,
	        );
	        
	        // Output to JSON format
	        echo json_encode($output);
	    }

		else {
			redirect ('/' , 'refresh');
		}
	}

	public function getReferralLists( $id ){

		if ( $this->ion_auth->logged_in() ) {

			$this->load->model('referrals');

	        $data = $row = array();
	        
	        // Fetch member's records
	        $memData = $this->referrals->getRows($_POST , $id );
	        
	        if ( isset($_POST['start'])) $i = $_POST['start'];

	        foreach($memData as $member){

	        	if ( $member->referral_status == 'pending' ) $member->referral_status = '<span class="text-danger">'.$member->referral_status.'</span>';

	        	else if ( $member->referral_status == 'Activated' ) { $member->referral_status = '<span class="text-success">'.$member->referral_status.'</span>';

	        	}

	        	$date_added = date("d M. Y  h:i a", $member->created_on);
	            
	            if ( $member->referral_status != '' ) $data[] = array($member->first_name.$member->last_name, $member->email, $date_added ,  $member->referral_status );
	        }

	        if ( isset($_POST['draw']) ) $draw = $_POST['draw'];

	        else $draw = '';

	        $output = array(
	            "draw" => $draw,
	            "recordsTotal" => $this->referrals->countAll( $id ),
	            "recordsFiltered" => $this->referrals->countFiltered($_POST, $id ),
	            "data" => $data,
	        );
	        
	        // Output to JSON format
	        echo json_encode($output);
	    }

		else {
			redirect ('/' , 'refresh');
		}
	}

	public function add_withdrawal_referrence_code ( $id ) {

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

			if ( $this->withdrawals->add_referrence_code( $id ) ) {

				echo '<p>Successfully added referrece code. <a href="'.base_url('administrator').'#withdrawal">Return to admin page</a></p>';

			}

			else {

				echo '<p>Unable to add referrece code. <a href="'.base_url('administrator').'#withdrawal">Return to admin page</a></p>';

			}
		}

		else {
			
			echo '<p>Unable to add referrece code. <a href="'.base_url('administrator').'#withdrawal">Return to admin page</a></p>';
			
		}
	}

	public function user_details_for_admin( $id ) {

		if ( $this->ion_auth->logged_in() && $this->ion_auth->is_admin() ) {

				$total_user_withdrawal_amount = $this->coin_solve_model->get_user_total_withdrawals( $id );
				$total_points_earned = $this->coin_solve_model->get_user_total_score($id);

				$data = array(
					'current_earnings_left'			=> ($total_points_earned-$total_user_withdrawal_amount)/10000,
					'user_data'						=> $this->ion_auth->user($id)->row(),
					'page'						=> 'admin',
					'page_title'				=> 'Administrator',
					'user_count'				=> $this->coin_solve_model_admin->get_all_user_count(),
					'withdrawal_count'			=> $this->coin_solve_model_admin->get_all_withdrawal_count(),
					'games_played_count_today'	=> $this->coin_solve_model_admin->get_all_games_played_count_today(),
					'meta_description'			=> 'Administrator',
					'games_played_count'		=> $this->coin_solve_model_admin->get_all_games_played_count(),
					'get_total_users_earned'	=> $this->coin_solve_model_admin->get_total_users_earned(), 
					'all_time_game_played'		=> $this->coin_solve_model_admin->all_time_game_played(), 
					'get_total_payable'			=> $this->coin_solve_model_admin->get_total_payable(),
					'get_total_payable'			=> $this->coin_solve_model_admin->get_total_payable()-$this->coin_solve_model_admin->get_total_withdrawed_amount(),
				);

				$this->load->view('templates/header' , $data );
				$this->load->view('user-details', $data);
				$this->load->view('templates/footer');

		}

	}

}

