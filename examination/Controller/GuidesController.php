<?php

namespace Examination\Controller;

use Admin\Controller\AdminController;

class GuidesController extends AdminController
{

    public function listing()
    {
		//$guides_link = trim($_GET['guide']);
		if(isset($_GET['guide'])){
			$guides_link = trim($_GET['guide']);
			$flag = 1;
		}else{
			$guides_link = $_POST['params'];
			$flag = 2;
		}
		switch($guides_link){
				
				/***** Справочник тем электро **********/
				case "spr_test_theme_elektro":
					   $this->load->model('Spr_test_themes_elektro');
					   $this->data['guides_data'] = $this->model->spr_test_themes_elektro->getSpr_test_themes_elektro();				   
					break;
				/***** Справочник тем тепло **********/
				case "spr_test_theme_teplo":
					   $this->load->model('Spr_test_themes_teplo');
					   $this->data['guides_data'] = $this->model->spr_test_themes_teplo->getSpr_test_themes_teplo();				   
					break;
				/***** Справочник тем газ **********/
				case "spr_test_theme_gaz":
					   $this->load->model('Spr_test_themes_gaz');
					   $this->data['guides_data'] = $this->model->spr_test_themes_gaz->getSpr_test_themes_gaz();				   
					break;					
				/***** Справочник видов деятельности **********/
				case "spr_test_napr":
					   $this->load->model('Spr_test_napr');
					   $this->data['guides_data'] = $this->model->spr_test_napr->getSpr_test_napr();
					  
					break;
				/***** Справочник групп электробезопасности **********/
				case "spr_test_group":
					   $this->load->model('Spr_test_group');
					   $this->data['guides_data'] = $this->model->spr_test_group->getSpr_test_group();
					  
					break;
				/***** Справочник групп электробезопасности **********/
				case "spr_test_vid":
					   $this->load->model('Spr_test_vid');
					   $this->data['guides_data'] = $this->model->spr_test_vid->getSpr_test_vid();
					  
					break;					
		}
		if($flag == 2){
			echo json_encode($this->data);	
			//print_r($this->data);	
		}else{
			$this->view->render('guides/list', $this->data);
		}
	}
/***************************************************** Добавление записи в справочник тем электро**************************************************************/
	public function add_test_theme_elektro()
    {

        $this->load->model('Spr_test_themes_elektro');

        $params = $this->request->post;
		
		$str_test_themes = '';
		
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_themesId = $this->model->spr_test_themes_elektro->updateSpr_test_themes_elektro($params);

		}else{
			
            $str_test_themesId = $this->model->spr_test_themes_elektro->createSpr_test_themes_elektro($params);
    

			if($str_test_themesId != 0){
				
				if($params['guides_place']== 2){
				$str_test_themes ="<tr class = 'item-$str_test_themesId'>";
				$str_test_themes .="<td name='razdel_name'>".$params['name']."</td>";
				$str_test_themes .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_test_themesId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_test_themesId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_themes = "<option value='$str_test_themesId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_themes;
        }
    }
/***************************************************** Добавление записи в справочник тем тепло**************************************************************/
	public function add_test_theme_teplo()
    {

        $this->load->model('Spr_test_themes_teplo');

        $params = $this->request->post;
		
		$str_test_themes = '';
		
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_themesId = $this->model->spr_test_themes_teplo->updateSpr_test_themes_teplo($params);

		}else{
			
            $str_test_themesId = $this->model->spr_test_themes_teplo->createSpr_test_themes_teplo($params);
    

			if($str_test_themesId != 0){
				
				if($params['guides_place']== 2){
				$str_test_themes ="<tr class = 'item-$str_test_themesId'>";
				$str_test_themes .="<td name='razdel_name'>".$params['name']."</td>";
				$str_test_themes .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_test_themesId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_test_themesId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_themes = "<option value='$str_test_themesId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_themes;
        }
    }
/***************************************************** Добавление записи в справочник тем газ**************************************************************/
	public function add_test_theme_gaz()
    {

        $this->load->model('Spr_test_themes_gaz');

        $params = $this->request->post;
		
		$str_test_themes = '';
		
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_themesId = $this->model->spr_test_themes_gaz->updateSpr_test_themes_gaz($params);

		}else{
			
            $str_test_themesId = $this->model->spr_test_themes_gaz->createSpr_test_themes_gaz($params);
    

			if($str_test_themesId != 0){
				
				if($params['guides_place']== 2){
				$str_test_themes ="<tr class = 'item-$str_test_themesId'>";
				$str_test_themes .="<td name='razdel_name'>".$params['name']."</td>";
				$str_test_themes .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_test_themesId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_test_themesId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_themes = "<option value='$str_test_themesId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_themes;
        }
    }	
/***************************************************** Добавление записи в справочник направлений деятельности**************************************************************/
	public function add_test_napr()
    {

        $this->load->model('Spr_test_napr');

        $params = $this->request->post;
		
		$str_test_napr = '';
	
	
		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_naprId = $this->model->spr_test_napr->updateSpr_test_napr($params);

		}else{
			
            $str_test_naprId = $this->model->spr_test_napr->createSpr_test_napr($params);
    

			if($str_test_naprId != 0){
				
				if($params['guides_place']== 2){
				$str_test_napr ="<tr class = 'item-$str_test_naprId'>";
				$str_test_napr .="<td name='napr_name'>".$params['name']."</td>";
				$str_test_napr .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_test_naprId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_test_naprId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_napr = "<option value='$str_test_naprId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_napr;
        }
    }

/***************************************************** Добавление записи в справочник групп электробезопасности**************************************************************/
	public function add_test_group()
    {

        $this->load->model('Spr_test_group');

        $params = $this->request->post;
		
		$str_test_group = '';
	
	
		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_groupId = $this->model->spr_test_group->updateSpr_test_group($params);

		}else{
			
            $str_test_groupId = $this->model->spr_test_group->createSpr_test_group($params);
    

			if($str_test_groupId != 0){
				
				if($params['guides_place']== 2){
				$str_test_group ="<tr class = 'item-$str_test_groupId'>";
				$str_test_group .="<td name='group_name'>".$params['name']."</td>";
				$str_test_group .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$str_test_groupId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($str_test_groupId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_group = "<option value='$str_test_groupId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_group;
        }
    }
/***************************************************** Добавление записи в справочник вид теста**************************************************************/
	public function add_test_vid()
    {

        $this->load->model('Spr_test_vid');

        $params = $this->request->post;
		
		$str_test_vid = '';
	
	
		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_vidId = $this->model->spr_test_vid->updateSpr_test_vid($params);

		}else{
			
            $spr_test_vidId = $this->model->spr_test_vid->createSpr_test_vid($params);
    

			if($spr_test_vidId != 0){
				
				if($params['guides_place']== 2){
				$str_test_vid ="<tr class = 'item-$spr_test_vidId'>";
				$str_test_vid .="<td name='vid_name'>".$params['name']."</td>";
				$str_test_vid .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindowGuides.openModalEdit('openModalGuides',$spr_test_vidId)\"><i class='icon-fixed-width icon-pencil'></i></button></div><div><button class='button-remove' onclick='guides.remove($spr_test_vidId)'><i class='icon-trash icons'></i></button></div></div></td></tr>";
				}else{
				$str_test_vid = "<option value='$spr_test_vidId'>".$params['name']."</option>";	
				}
			
			
			}
			echo $str_test_vid;
        }
    }
/***************************************************** Добавление записи в таблицу редактирования количества вопросов у электриков**************************************************************/
	public function add_test_question()
    {

        $this->load->model('Spr_test_themes_elektro');

        $params = $this->request->post;
		
		$spr_test_themes = '';

		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_themesId = $this->model->spr_test_themes_elektro->updateSpr_test_themes_elektro($params);

		}else{
			
            $spr_test_themesId = $this->model->spr_test_themes_elektro->createSpr_test_themes_elektro($params);
    

			echo $spr_test_themes;
        }
    }
/***************************************************** Добавление записи в таблицу редактирования количества неправильных ответов у электриков**************************************************************/
	public function add_test_wrong_answer()
    {

        $this->load->model('Spr_test_elektro_settings');

        $params = $this->request->post;
		
		$spr_test_wrong_answer = '';

		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_wrong_answerId = $this->model->spr_test_elektro_settings->updateSpr_test_elektro_settings($params);

		}else{
			
            $spr_test_wrong_answerId = $this->model->spr_test_elektro_settings->createSpr_test_elektro_settings($params);
    

			echo $spr_test_wrong_answer;
        }
    }

/***************************************************** Добавление записи в таблицу редактирования количества попыток у электриков**************************************************************/
	public function add_test_attempt()
    {

        $this->load->model('Spr_test_elektro_settings');

        $params = $this->request->post;
		
		$spr_test_attempt = '';

		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_attemptId = $this->model->spr_test_elektro_settings->updateSpr_test_elektro_settings($params);

		}else{
			
            $spr_test_attemptId = $this->model->spr_test_elektro_settings->createSpr_test_elektro_settings($params);
    

			echo $spr_test_attempt;
        }
    }
/***************************************************** Добавление записи в таблицу количества вопросов по темам у тепловиков*************************************************************/	
	public function add_test_question_teplo()
    {

        $this->load->model('Spr_test_themes_teplo');

        $params = $this->request->post;
		
		$spr_test_themes_teplo = '';
	
		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_themes_teploId = $this->model->spr_test_themes_teplo->updateSpr_test_themes_teplo($params);

		}else{
			
            $spr_test_themes_teploId = $this->model->spr_test_themes_teplo->createSpr_test_themes_teplo($params);
    

			echo $spr_test_themes_teplo;
        }
    }
/***************************************************** Добавление записи в таблицу редактирования количества неправильных ответов у тепловиков**************************************************************/
	public function add_test_wrong_answer_t()
    {

        $this->load->model('Spr_test_teplo_settings');

        $params = $this->request->post;
		
		$spr_test_wrong_answer_t = '';

		
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_wrong_answer_tId = $this->model->spr_test_teplo_settings->updateSpr_test_teplo_settings($params);

		}else{
			
            $spr_test_wrong_answer_tId = $this->model->spr_test_teplo_settings->createSpr_test_teplo_settings($params);
    

			echo $spr_test_wrong_answer_t;
        }
    }	

/***************************************************** Добавление записи в таблицу редактирования количества попыток у тепловиков**************************************************************/
	public function add_test_attempt_t()
    {

        $this->load->model('Spr_test_teplo_settings');

        $params = $this->request->post;
		
		$spr_test_attempt_t = '';

	print_r($params);
	
		if (isset($params['id']) && strlen($params['id']) > 0) {
			$spr_test_attempt_tId = $this->model->spr_test_teplo_settings->updateSpr_test_teplo_settings($params);

		}else{
			
            $spr_test_attempt_tId = $this->model->spr_test_teplo_settings->createSpr_test_teplo_settings($params);
    

			echo $spr_test_attempt_t;
        }
    }	
/************************************************************* Удаление записи  *************************************************************************************************************/
	public function removeItem()
    {
		$params = $this->request->post;
  		$guides_links = $params['name_table'];


		
		switch($guides_links){


				/***** Справочник тем электро **********/			
				case "spr_test_theme_elektro":
						$params = $this->request->post;
						$this->load->model('Spr_test_themes_elektro');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_themes_elektro->removeItems($params['item_id']);
							}
					break;
				/***** Справочник тем тепло **********/			
				case "spr_test_theme_teplo":
						$params = $this->request->post;
						$this->load->model('Spr_test_themes_teplo');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_themes_teplo->removeItems($params['item_id']);
							}
					break;	
				/***** Справочник тем тепло **********/			
				case "spr_test_theme_gaz":
						$params = $this->request->post;
						$this->load->model('Spr_test_themes_gaz');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_themes_gaz->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник видов деятельности  **********/			
				case "spr_test_napr":
						$params = $this->request->post;
						$this->load->model('Spr_test_napr');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_napr->removeItems($params['item_id']);
							}
					break;	
				/***** Справочник групп электробезопасности  **********/			
				case "spr_test_group":
						$params = $this->request->post;
						$this->load->model('Spr_test_group');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_group->removeItems($params['item_id']);
							}
					break;
				/***** Справочник групп электробезопасности  **********/			
				case "spr_test_vid":
						$params = $this->request->post;
						$this->load->model('Spr_test_vid');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_vid->removeItems($params['item_id']);
							}
					break;					
				/***** Справочник настройки вопросов в билетах электриков  **********/			
				case "spr_test_vid":
						$params = $this->request->post;
						$this->load->model('Spr_test_vid');
							if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
								$removeItem = $this->model->spr_test_vid->removeItems($params['item_id']);
							}
					break;
		}
	}

	
	





	
}