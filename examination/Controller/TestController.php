<?php

namespace Examination\Controller;


use Admin\Controller\AdminController;


class TestController extends AdminController
{

    public function create()
    {

        $this->load->model('Spr_test_napr');		
		$this->data['spr_test_napr'] = $this->model->spr_test_napr->getSpr_test_napr();

        $this->load->model('Spr_test_group');		
		$this->data['spr_test_group'] = $this->model->spr_test_group->getSpr_test_group();	

        $this->load->model('Spr_test_vid');		
		$this->data['spr_test_vid'] = $this->model->spr_test_vid->getSpr_test_vid();

		$this->load->model('Spr_test_reasons_elektro');		// причины проведения тестирования
		$this->data['spr_test_reasons_elektro'] = $this->model->spr_test_reasons_elektro->getSpr_test_reasons_elektro();

		$this->load->model('Spr_test_reasons_teplo');		// причины проведения тестирования
		$this->data['spr_test_reasons_teplo'] = $this->model->spr_test_reasons_teplo->getSpr_test_reasons_teplo();			

		$this->load->model('Spr_test_validity');		// срок действия результатов проверки знаний
		$this->data['spr_test_validity'] = $this->model->spr_test_validity->getSpr_test_validity();	

		/****  Филиал ****/
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();	
	
		/*****  МРО  *****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['spr_cod_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['spr_cod_podrazd']);
		
		
		$this->view->render('testing/test', $this->data);
    }
	
	
	
	public function enter_result()
    {

        $this->load->model('Spr_test_napr');		
		$this->data['spr_test_napr'] = $this->model->spr_test_napr->getSpr_test_napr();

        $this->load->model('Spr_test_group');		
		$this->data['spr_test_group'] = $this->model->spr_test_group->getSpr_test_group();		
		
		$this->load->model('Spr_test_reasons_elektro');		// причины проведения тестирования
		$this->data['spr_test_reasons_elektro'] = $this->model->spr_test_reasons_elektro->getSpr_test_reasons_elektro();

		$this->load->model('Spr_test_reasons_teplo');		// причины проведения тестирования
		$this->data['spr_test_reasons_teplo'] = $this->model->spr_test_reasons_teplo->getSpr_test_reasons_teplo();
		

		$this->load->model('Spr_test_validity');		// срок действия результатов проверки знаний
		$this->data['spr_test_validity'] = $this->model->spr_test_validity->getSpr_test_validity();	
		
		/****  Филиал ****/
		$this->load->model('Branch');		
		$this->data['branchs'] = $this->model->branch->getBranch();	
	
		/*****  МРО  *****/
		$this->load->model('Podrazdelenie');	
		$this->data['podrazdelenies'] = $this->model->podrazdelenie->getPodrazdelenieByRegion($this->data['spr_cod_branch']);		
		/**** Отделы (Otdel) ****/
		$this->load->model('Otdel');	
		$this->data['otdels'] = $this->model->otdel->getOtdelByPodrazdelenie($this->data['spr_cod_podrazd']);
		
		$this->view->render('testing/enter_result', $this->data);
    }

    public function test_settings()
    {

		$this->load->model('Spr_test_themes_elektro');
		$this->data['spr_test_themes_elektro'] = $this->model->spr_test_themes_elektro->getSpr_test_themes_elektro();

		$this->load->model('Spr_test_themes_teplo');
		$this->data['spr_test_themes_teplo'] = $this->model->spr_test_themes_teplo->getSpr_test_themes_teplo();
		
		
		$this->load->model('Spr_test_elektro_settings');
		$this->data['spr_test_elektro_settings'] = $this->model->spr_test_elektro_settings->getSpr_test_elektro_settings();	

		$this->load->model('Spr_test_teplo_settings');
		$this->data['spr_test_teplo_settings'] = $this->model->spr_test_teplo_settings->getSpr_test_teplo_settings();			
		

		$this->view->render('testing/settings', $this->data);
    }

    public function edit_questions_elektro()
    {

		$this->load->model('Test_questions_elektro');
		$this->data['test_questions_elektro'] = $this->model->test_questions_elektro->getTest_questions_elektro();

		$this->load->model('Test_questions_teplo');
		$this->data['test_questions_teplo'] = $this->model->test_questions_teplo->getTest_questions_teplo();

		$this->load->model('Spr_test_themes_elektro');
		$this->data['themeses'] = $this->model->spr_test_themes_elektro->getSpr_test_themes_elektro();
		
		$this->load->model('Spr_test_themes_teplo');
		$this->data['themeses_t'] = $this->model->spr_test_themes_teplo->getSpr_test_themes_teplo();	

		$this->view->render('edit_questions/edit', $this->data);
    }
	
	 public function get_answers_by_question()
    {
		$params = $this->request->post;
		//print_r($params);
		$this->load->model('Test_answers_elektro');
				
		$array_answers = $this->model->test_answers_elektro->getTest_answers_by_question($params['id_qstn']);

		 echo json_encode($array_answers);
    }


	 public function get_answers_by_question_teplo()
    {
		$params = $this->request->post;
		//print_r($params);
		$this->load->model('Test_answers_teplo');
				
		$array_answers = $this->model->test_answers_teplo->getTest_answers_by_question($params['id_qstn']);

		 echo json_encode($array_answers);
    }
	
    public function add_result()
    {
        $this->load->model('Test');

        $params = $this->request->post;


       /* if (isset($params['id_otv'])) {
            $testId = $this->model->test->InsertResult($params);
            echo '$testId '.$testId;
        }*/
		
		if($params['test_napr'] == 1){
			
			$this->load->model('Test_book_e');
			$bookID = $this->data['book_eID'] = $this->model->test_book_e->createBook_e($params);
			
		}
		
		if($params['test_napr'] == 2){
			
			$this->load->model('Test_book_t');
			$bookID = $this->data['book_tID'] = $this->model->test_book_t->createBook_t($params);
			
		}
		
		echo $bookID;
    }

    public function add_test()
    {
        $this->load->model('Test');

        $params = $this->request->post;


        if (isset($params['id_otv'])) {
            $testId = $this->model->test->CreateTest($params);
            echo '$testId '.$testId;
        }
    }

	 public function new_test()
    {
			$params = $this->request->post;
			
	//	print_r($params);	
		// электро	
		if($params['test_napr'] == 1){ 
			
			$arr_qstns = [];
			$arr_answrs = [];
			$group = 'group'.$params['test_group'];
	
			
			$this->load->model('Spr_test_themes_elektro');
			$arr_themes = $this->model->spr_test_themes_elektro->getSpr_test_themes_elektro_by_group($params['test_group']);
			
			$this->load->model('Test_questions_elektro');
			
			foreach($arr_themes as $one_theme){
				
					$num_qstns = $one_theme[$group];
				
					$id_theme = $one_theme['id'];
			
					
					
					$res = $this->model->test_questions_elektro->getTest_questions_elektro_by_theme($id_theme, $num_qstns);
					
					foreach($res as $item){
						array_push($arr_qstns, $item);
					}
				
			}
			
			$this->data['arr_qstns'] = $arr_qstns;
			
			$this->load->model('Test_answers_elektro');
			
			foreach($arr_qstns as $one_qstn){
				
				$res = $this->model->test_answers_elektro->getTest_answers_by_questionRand($one_qstn['id']);
				
				foreach($res as $item){
						array_push($arr_answrs, $item);
					}
			}
			
			$this->data['arr_answrs'] = $arr_answrs;
			
			$this->load->model('Spr_test_elektro_settings');
			$arr_settings = $this->model->spr_test_elektro_settings->getSpr_test_elektro_settings();
			
			$this->data['set_try'] = $arr_settings[1][$group]; // количество попыток
			$this->data['set_time'] =$arr_settings[1][$group]; // время на тест
			$this->data['set_wrong_answers'] =$arr_settings[0][$group]; // допустимое количество неверных ответов
			$this->data['test_vid'] =$params['test_vid']; // пробный / основной
			if($params['test_vid'] == 1){
				$this->load->model('Test_book_e');
				$this->data['book_eID'] = $this->model->test_book_e->createBook_e($params); //id записи в журнале результатов
			};
		};
		
		// Тепло
		if($params['test_napr'] == 2){
			$arr_qstns = [];
			$arr_answrs = [];
			$str_themes = '';
			$this->load->model('Spr_test_themes_teplo');
			$arr_themes = $this->model->spr_test_themes_teplo->getSpr_test_themes_teplo_by_group();
			
			$this->load->model('Test_questions_teplo');
			
			foreach($arr_themes as $one_theme){
				
					$num_qstns = $one_theme['count_g'];
				
					$id_theme = $one_theme['id'];
			
					
					
					$res = $this->model->test_questions_teplo->getTest_questions_teplo_by_theme($id_theme, $num_qstns);
					
					foreach($res as $item){
						array_push($arr_qstns, $item);
					}
					$str_themes .=$one_theme['name'].';';
			}
			
			$params['themes'] = $str_themes;
			
			$this->data['arr_qstns'] = $arr_qstns;
			
			$this->load->model('Test_answers_teplo');
			
			foreach($arr_qstns as $one_qstn){
				
				$res = $this->model->test_answers_teplo->getTest_answers_by_questionRand($one_qstn['id']);
				
				foreach($res as $item){
						array_push($arr_answrs, $item);
					}
			}
			
			$this->data['arr_answrs'] = $arr_answrs;
			$this->load->model('Spr_test_teplo_settings');
			$arr_settings = $this->model->spr_test_teplo_settings->getSpr_test_teplo_settings();
			
			$this->data['set_try'] = 1; // количество попыток
	
			$this->data['set_wrong_answers'] =$arr_settings[0]['count_g']; // допустимое количество неверных ответов
			$this->data['set_time'] =$arr_settings[1]['count_g']; // время на тест
			$this->data['test_vid'] =$params['test_vid']; // пробный / основной
			
			if($params['test_vid'] == 1){
				$this->load->model('Test_book_t');
				$this->data['book_tID'] = $this->model->test_book_t->createBook_t($params); //id записи в журнале результатов
			};
			
			
		};
		
			$this->data['id_otv'] =$params['id_otv']; // id ответственного
			$this->data['test_napr'] =$params['test_napr']; // 
			$this->data['test_group'] =$params['test_group']; // 
			$this->data['formUnpId'] =$params['formUnpId']; // 
			$this->data['name_unp'] =$params['name_unp']; // 
			$this->data['resp_pers_secondname'] =$params['resp_pers_secondname']; // 
			$this->data['resp_pers_firstname'] =$params['resp_pers_firstname']; // 
			$this->data['resp_pers_lastname'] =$params['resp_pers_lastname']; // 
			$this->data['resp_pers_post'] =$params['resp_pers_post']; // 
			$this->data['resp_pers_post_data'] =$params['resp_pers_post_data']; // 
			$this->data['resp_pers_tel'] =$params['resp_pers_tel']; // 
			$this->data['resp_pers_email'] =$params['resp_pers_email']; // 
			$this->data['formBranchObject'] =$params['formBranchObject']; // 
			$this->data['formPodrazdelenieObject'] =$params['formPodrazdelenieObject']; // 
			$this->data['formOtdelObject'] =$params['formOtdelObject']; // 
			$this->data['member_1'] =$params['member_1']; // 
			$this->data['member_1_position'] =$params['member_1_position']; // 
			$this->data['member_2'] =$params['member_2']; // 
			$this->data['member_2_position'] =$params['member_2_position']; // 
			$this->data['member_3'] =$params['member_1']; // 
			$this->data['member_3_position'] =$params['member_3_position']; // 
			$this->data['test_reasons_el'] =$params['test_reasons_e']; // 
			$this->data['experience_position'] =$params['experience_position']; // 
			$this->data['test_validity'] =$params['test_validity_positive']; // 
			$this->data['test_reasons_teplo'] =$params['test_reasons_teplo']; // 
			$this->data['test_date_old'] =$params['test_date_old']; //
			$this->data['test_validity_year'] =$params['test_validity_year']; //


			
			
	/*	print_r($arr_qstns);	
		print_r($arr_answrs);	*/
		
		$this->view->render('testing/main_test', $this->data);	
	}


/***************************************************** редактирование вопроса электриков**************************************************************/
	public function add_test_question()
    {

        $this->load->model('Test_questions_elektro');


        $params = $this->request->post;
		
		$str_test_answ = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_answId = $this->model->test_questions_elektro->updateTest_questions_elektro($params);

			$this->load->model('Test_answers_elektro');
			$this->model->test_answers_elektro->updateTest_answers_elektro($params);			
		
			/*$str_test_answ = $params['question'];
			
			
			echo $str_test_answ;*/
		
		}else{
			
            $str_test_answId = $this->model->test_questions_elektro->createTest_questions_elektro($params);
    

			if($str_test_answId != 0){
				$params['id'] = $str_test_answId;	
				$str_test_answ ="<tr id_question_elekto = '$str_test_answId' id_themes_elekto= ".$params['id_theme'].">";
				$str_test_answ .="<td name='id_question_elektro'>".$params['id']."</td>";
				$str_test_answ .="<td name='name_question_elektro'>".$params['question']."</td>";
				$str_test_answ .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEditQuestions('ModalQuestion_elekto',$str_test_answId)\"><i class='icon-fixed-width icon-pencil'></i></button></div></div></td></tr>";

			//<div><button class='button-remove' onclick='guides.remove($str_test_answId)'><i class='icon-trash icons'></i></button></div>
			
				$this->load->model('Test_answers_elektro');
				$this->model->test_answers_elektro->createTest_answers_elektro($params);
			
			}
			echo $str_test_answ;
        }
    }
/***************************************************** редактирование вопроса тепловиков**************************************************************/
	public function add_test_question_teplo()
    {

        $this->load->model('Test_questions_teplo');


        $params = $this->request->post;
		
		$str_test_answ = '';
		

		if (isset($params['id']) && strlen($params['id']) > 0) {
			$str_test_answId = $this->model->test_questions_teplo->updateTest_questions_teplo($params);

			$this->load->model('Test_answers_teplo');
			$this->model->test_answers_teplo->updateTest_answers_teplo($params);			
		
			/*$str_test_answ = $params['question'];
			
			
			echo $str_test_answ;*/
		
		}else{
			
            $str_test_answId = $this->model->test_questions_teplo->createTest_questions_teplo($params);
    

			if($str_test_answId != 0){
				$params['id'] = $str_test_answId;	
				$str_test_answ ="<tr id_question_teplo = '$str_test_answId' id_themes_teplo= ".$params['id_theme'].">";
				$str_test_answ .="<td name='id_question_teplo'>".$params['id']."</td>";
				$str_test_answ .="<td name='name_question_teplo'>".$params['question']."</td>";
				$str_test_answ .="<td><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEditQuestionsTeplo('ModalQuestion_teplo',$str_test_answId)\"><i class='icon-fixed-width icon-pencil'></i></button></div></div></td></tr>";

			//<div><button class='button-remove' onclick='guides.remove($str_test_answId)'><i class='icon-trash icons'></i></button></div>
			
				$this->load->model('Test_answers_teplo');
				$this->model->test_answers_teplo->createTest_answers_teplo($params);
			
			}
			echo $str_test_answ;
        }
    }
/***************************************************** фильтр по теме у электриков**************************************************************/
	public function select_q_themes()
    {

        $this->load->model('Test_questions_elektro');


        $params = $this->request->post;
		$id_theme = $params['id_t'];


		$str_test_q = [];

			

		$str_test_q = $this->model->test_questions_elektro->Select_questions_elektroByThemes($id_theme);
		$str_test_q_all = $this->model->test_questions_elektro->getTest_questions_elektro();
		
			if(count($str_test_q) > 0){

				$str_result = '';
				
				
				
				foreach($str_test_q as $arr_item){	
					
					$str_result .='<tr id_question_elekto = '.$arr_item['id'].' id_themes_elekto= '.$arr_item['id_theme'].'>';
					$str_result .='<td width="10%" name="id_question_elektro">'.$arr_item['id'].'</td>';
					$str_result .='<td width="80%" name="name_question_elektro">'.$arr_item['question'].'</td>';
					$str_result .='<td width="10%"><div class="menu-item-event"><div><button class="button-edit" onclick = \'modalWindow.openModalEditQuestions("ModalQuestion_elekto",'.$arr_item['id'].')\'><i class="icon-fixed-width icon-pencil"></i></button></div></div></td></tr>';
					
				}	
					
					

			}else if(count($str_test_q) == 0 && $id_theme > 0){
				
					$str_result = '<p>Вопросов по данной теме не существует</p>';	
			
			}else{		
				$str_result = '';
				
				foreach($str_test_q_all as $arr_item){	
					
					$str_result .='<tr id_question_elekto = '.$arr_item['id'].' id_themes_elekto= '.$arr_item['id_theme'].'>';
					$str_result .='<td  width="10%" name="id_question_elektro">'.$arr_item['id'].'</td>';
					$str_result .='<td width="80%" name="name_question_elektro">'.$arr_item['question'].'</td>';
					$str_result .='<td width="10%"><div class="menu-item-event"><div><button class="button-edit" onclick = \'modalWindow.openModalEditQuestions("ModalQuestion_elekto",'.$arr_item['id'].')\'><i class="icon-fixed-width icon-pencil"></i></button></div></div></td></tr>';
					
				}
			}
	
			echo $str_result;
	
	}

/***************************************************** фильтр по теме у тепловиков**************************************************************/
	public function select_q_themes_t()
    {

        $this->load->model('Test_questions_teplo');


        $params = $this->request->post;
		$id_theme = $params['id_tep'];


		$str_test_qt = [];

			

		$str_test_qt = $this->model->test_questions_teplo->Select_questions_teploByThemes($id_theme);
		$str_test_qt_all = $this->model->test_questions_teplo->getTest_questions_teplo();
		
			if(count($str_test_qt) > 0){

				$str_result_t = '';
				
				
				
				foreach($str_test_qt as $arr_item){	
					
					$str_result_t .='<tr id_question_teplo = '.$arr_item['id'].' id_themes_teplo= '.$arr_item['id_theme'].'>';
					$str_result_t .='<td width="10%" name="id_question_teplo">'.$arr_item['id'].'</td>';
					$str_result_t .='<td width="80%" name="name_question_teplo">'.$arr_item['question'].'</td>';
					$str_result_t .='<td width="10%"><div class="menu-item-event"><div><button class="button-edit" onclick = \'modalWindow.openModalEditQuestionsTeplo("ModalQuestion_teplo",'.$arr_item['id'].')\'><i class="icon-fixed-width icon-pencil"></i></button></div></div></td></tr>';
					
				}	
					
					

			}else if(count($str_test_qt) == 0 && $id_theme > 0){
				
				$str_result_t = '<p>Вопросов по данной теме не существует</p>';	
			
			}else{	
				
				
				$str_result_t = '';
				
				foreach($str_test_qt_all as $arr_item){	
					
					$str_result_t .='<tr id_question_teplo = '.$arr_item['id'].' id_themes_teplo= '.$arr_item['id_theme'].'>';
					$str_result_t .='<td  width="10%" name="id_question_teplo">'.$arr_item['id'].'</td>';
					$str_result_t .='<td width="80%" name="name_question_teplo">'.$arr_item['question'].'</td>';
					$str_result_t .='<td width="10%"><div class="menu-item-event"><div><button class="button-edit" onclick = \'modalWindow.openModalEditQuestionsTeplo("ModalQuestion_teplo",'.$arr_item['id'].')\'><i class="icon-fixed-width icon-pencil"></i></button></div></div></td></tr>';
					
				}
			}
	
			echo $str_result_t;
	
	}
/// запись в журнал результата тестирования	
	public function writeTestResult()
	{
		$params = $this->request->post;
		
		print_r($params);
		
		if($params['book_eID'] !== 'undefined'){
			
			
			$this->load->model('Test_book_e');
			$this->model->test_book_e -> updateBook_e($params);
			
			
		};
		
		if($params['book_tID'] !== 'undefined'){
		
			$this->load->model('Test_book_t');
			$this->model->test_book_t->updateBook_t($params);
			
		};
	}
}