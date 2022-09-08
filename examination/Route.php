<?php

$this->router->add('home', '/examination/main/', 'HomeController:index');


//Guides Routes;
$this->router->add('guides-list', '/examination/guides/list/', 'GuidesController:listing');
$this->router->add('guides-list-post', '/examination/guides/list/', 'GuidesController:listing','POST');
$this->router->add('guides-remove-item', '/examination/guides/removeItem/', 'GuidesController:removeItem', 'POST');


$this->router->add('add_test_theme_elektro-add', '/examination/guides/add_test_theme_elektro/', 'GuidesController:add_test_theme_elektro', 'POST');
$this->router->add('add_test_theme_teplo-add', '/examination/guides/add_test_theme_teplo/', 'GuidesController:add_test_theme_teplo', 'POST');
$this->router->add('add_test_theme_gaz-add', '/examination/guides/add_test_theme_gaz/', 'GuidesController:add_test_theme_gaz', 'POST');
$this->router->add('add_test_napr-add', '/examination/guides/add_test_napr/', 'GuidesController:add_test_napr', 'POST');
$this->router->add('add_test_group-add', '/examination/guides/add_test_group/', 'GuidesController:add_test_group', 'POST');
$this->router->add('add_test_vid-add', '/examination/guides/add_test_vid/', 'GuidesController:add_test_vid', 'POST');
$this->router->add('add_test_question-add', '/examination/guides/add_test_question/', 'GuidesController:add_test_question', 'POST');
$this->router->add('add_test_question_teplo-add', '/examination/guides/add_test_question_teplo/', 'GuidesController:add_test_question_teplo', 'POST');
$this->router->add('add_test_wrong_answer-add', '/examination/guides/add_test_wrong_answer/', 'GuidesController:add_test_wrong_answer', 'POST');
$this->router->add('add_test_attempt-add', '/examination/guides/add_test_attempt/', 'GuidesController:add_test_attempt', 'POST');

$this->router->add('add_test_wrong_answer_t-add', '/examination/guides/add_test_wrong_answer_t/', 'GuidesController:add_test_wrong_answer_t', 'POST');
$this->router->add('add_test_attempt_t-add', '/examination/guides/add_test_attempt_t/', 'GuidesController:add_test_attempt_t', 'POST');
//Testing
$this->router->add('result-add', '/examination/testing/add_result/', 'TestController:add_result', 'POST');
$this->router->add('test-add', '/examination/testing/add_test/', 'TestController:add_test', 'POST');
$this->router->add('test_question-add', '/examination/testing/add_test_question/', 'TestController:add_test_question', 'POST');
$this->router->add('test_question_teplo-add', '/examination/testing/add_test_question_teplo/', 'TestController:add_test_question_teplo', 'POST');
$this->router->add('select_q_themes-add', '/examination/testing/select_q_themes/', 'TestController:select_q_themes', 'POST');
$this->router->add('select_q_themes_t-add', '/examination/testing/select_q_themes_t/', 'TestController:select_q_themes_t', 'POST');

$this->router->add('search', '/examination/search/', 'SearchController:search', 'POST');


$this->router->add('test-create', '/examination/testing/test/', 'TestController:create');
$this->router->add('test-enter_result', '/examination/testing/enter_result/', 'TestController:enter_result');
$this->router->add('test-settings', '/examination/testing/settings/', 'TestController:test_settings');
$this->router->add('test-edit_questions_elektro', '/examination/edit_questions/edit/', 'TestController:edit_questions_elektro');
$this->router->add('test_get_answers_by_question', '/examination/get_answers_by_question/', 'TestController:get_answers_by_question', 'POST');
$this->router->add('test_get_answers_by_question_teplo', '/examination/get_answers_by_question_teplo/', 'TestController:get_answers_by_question_teplo', 'POST');
$this->router->add('test-new', '/examination/testing/new_test/', 'TestController:new_test', 'POST');
$this->router->add('test-write-test-result', '/examination/testing/write_test_result/', 'TestController:writeTestResult', 'POST');


//responsible_persons
$this->router->add('responsible_persons', '/examination/responsible_persons/', 'ResponsiblePersonsController:search');
$this->router->add('responsible_persons-list', '/examination/responsible_persons/list/(id:int)', 'ResponsiblePersonsController:listing');
$this->router->add('responsible_persons-create', '/examination/responsible_persons/create/', 'ResponsiblePersonsController:create');
$this->router->add('responsible_persons-create-unp', '/examination/responsible_persons/create/(id:int)', 'ResponsiblePersonsController:create');
$this->router->add('responsible_persons-edit', '/examination/responsible_persons/edit/(id:int)', 'ResponsiblePersonsController:edit');
$this->router->add('responsible_persons-add', '/examination/responsible_persons/add/', 'ResponsiblePersonsController:add', 'POST');
$this->router->add('responsible_persons-update', '/examination/responsible_persons/update/', 'ResponsiblePersonsController:update', 'POST');
$this->router->add('responsible_persons-remove-item', '/examination/responsible_persons/removeItem/', 'ResponsiblePersonsController:removeItem', 'POST');
$this->router->add('responsible_persons-info', '/examination/responsible_persons/info/(id:int)', 'ResponsiblePersonsController:info', 'POST');
$this->router->add('responsible_persons-listpers', '/examination/responsible_persons/ListRespPers/', 'ResponsiblePersonsController:ListPers', 'POST');
$this->router->add('responsible_persons-edit_post_e', '/examination/responsible_persons/update_post_e/', 'ResponsiblePersonsController:edit_post_e', 'POST');
$this->router->add('responsible_persons-edit_post_t', '/examination/responsible_persons/update_post_t/', 'ResponsiblePersonsController:edit_post_t', 'POST');
$this->router->add('responsible_persons-edit_post_g', '/examination/responsible_persons/update_post_g/', 'ResponsiblePersonsController:edit_post_g', 'POST');
//test_question
$this->router->add('test_question_form', '/examination/testing/loadexcel/', 'LoadexcelController:MainForm');


//zurnal
$this->router->add('zurnal_e-list', '/examination/zurnal/zurnal_e/', 'ZurnalController:listing_e');
$this->router->add('zurnal_t-list', '/examination/zurnal/zurnal_t/', 'ZurnalController:listing_t');
$this->router->add('zurnal_g-list', '/examination/zurnal/zurnal_g/', 'ZurnalController:listing_g');
$this->router->add('zurnal_e-edit', '/examination/zurnal/zurnal_e_edit/(id:int)', 'ZurnalController:edit_e');
$this->router->add('zurnal_t-edit', '/examination/zurnal/zurnal_t_edit/(id:int)', 'ZurnalController:edit_t');
$this->router->add('zurnal_g-edit', '/examination/zurnal/zurnal_g_edit/(id:int)', 'ZurnalController:edit_g');
$this->router->add('mf-filter-items_for_pagination', '/examination/filter/count_items_for_pagination/', 'FilterController:count_items_for_pagination', 'POST');
$this->router->add('mf-filter-zurnal', '/examination/filter/mf_zurnal/', 'FilterController:mf_zurnal', 'POST');
$this->router->add('mf-filter-zurnal_t', '/examination/filter/mf_zurnal_t/', 'FilterController:mf_zurnal_t', 'POST');
$this->router->add('mf-filter-zurnal_g', '/examination/filter/mf_zurnal_g/', 'FilterController:mf_zurnal_g', 'POST');


//report zurnal
$this->router->add('report-zurnal-filter_main_e', '/examination/report/zurnalfilter_main_e/', 'ReportController:report_zurnal_main_filter_e', 'POST');
$this->router->add('report-zurnal-filter_main_t', '/examination/report/zurnalfilter_main_t/', 'ReportController:report_zurnal_main_filter_t', 'POST');
$this->router->add('report-zurnal-filter_main_g', '/examination/report/zurnalfilter_main_g/', 'ReportController:report_zurnal_main_filter_g', 'POST');
?>