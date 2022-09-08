<?php
/**
 * List of routes in the Admin environment
 */

/* $this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('pre-auth', '/admin/preAuth/', 'LoginController:preAuth', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

// Pages Account ()
$this->router->add('account', '/admin/account/', 'AccountController:account');

// Pages Routes (GET)
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('page-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
// Pages Routes (POST)
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');

// Posts Routes (GET)
$this->router->add('posts', '/admin/posts/', 'PostController:listing');
$this->router->add('post-create', '/admin/posts/create/', 'PostController:create');
$this->router->add('post-edit', '/admin/posts/edit/(id:int)', 'PostController:edit');
// Posts Routes (POST)
$this->router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');
$this->router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');

// Settings Routes (GET)
$this->router->add('settings-general', '/admin/settings/general/', 'SettingController:general');
$this->router->add('settings-menus', '/admin/settings/appearance/menus/', 'SettingController:menus');


// Pages Routes (POST)
$this->router->add('setting-update', '/admin/settings/update/', 'SettingController:updateSetting', 'POST');
$this->router->add('setting-add-menu', '/admin/setting/ajaxMenuAdd/', 'SettingController:ajaxMenuAdd', 'POST');
$this->router->add('setting-add-menu-item', '/admin/setting/ajaxMenuAddItem/', 'SettingController:ajaxMenuAddItem', 'POST');
$this->router->add('setting-sort-menu-item', '/admin/setting/ajaxMenuSortItems/', 'SettingController:ajaxMenuSortItems', 'POST');
$this->router->add('setting-remove-menu-item', '/admin/setting/ajaxMenuRemoveItem/', 'SettingController:ajaxMenuRemoveItem', 'POST');
$this->router->add('setting-update-menu-item', '/admin/setting/ajaxMenuUpdateItem/', 'SettingController:ajaxMenuUpdateItem', 'POST'); */

$this->router->add('dashboard', '/admin/', 'DashboardController:index');
// UNP Routes (POST)
$this->router->add('home', '/basis/main/', 'HomeController:index');
$this->router->add('unp', '/basis/unp/', 'UnpController:search');
$this->router->add('unp-list', '/basis/unp/list/', 'UnpController:listing');
$this->router->add('unp-create', '/basis/unp/create/', 'UnpController:create');
$this->router->add('unp-edit', '/basis/unp/edit/(id:int)', 'UnpController:edit');
$this->router->add('unp-add', '/basis/unp/add/', 'UnpController:add', 'POST');
$this->router->add('unp-rename', '/basis/unp/rename/', 'UnpController:renameUnp', 'POST');
$this->router->add('unp-update', '/basis/unp/update/', 'UnpController:update', 'POST');
$this->router->add('unp-remove-item', '/basis/unp/removeItem/', 'UnpController:removeItem', 'POST');
$this->router->add('unp-info', '/basis/unp/info/(id:int)', 'UnpController:info', 'POST');
$this->router->add('unp-portal', '/basis/unp/portalinfo/', 'UnpController:getPortal', 'POST');
$this->router->add('unp-check-sbj-rsp', '/basis/unp/checkSbjAndRsp/', 'UnpController:findSbjAndRsp', 'POST');

// REGION Routes (POST)
$this->router->add('region', '/basis/region/', 'RegionController:listing');
$this->router->add('region-create', '/basis/region/create/', 'RegionController:create');
$this->router->add('region-edit', '/basis/region/edit/(id:int)', 'RegionController:edit');
$this->router->add('region-add', '/basis/region/add/', 'RegionController:add', 'POST');
$this->router->add('region-update', '/basis/region/update/', 'RegionController:update', 'POST');

// ADDRESS Routes (POST)
$this->router->add('address-selectdistrict', '/basis/address/selectdistrict/', 'AddressController:SelectDistrict', 'POST');
$this->router->add('address-selectcity', '/basis/address/selectcity/', 'AddressController:SelectCity', 'POST');
$this->router->add('address-selectcityzone', '/basis/address/selectcityzone/', 'AddressController:SelectCityZone', 'POST');

$this->router->add('address-selectpodrazdelenie', '/basis/address/selectpodrazdelenie/', 'AddressController:selectpodrazdelenie', 'POST');
$this->router->add('address-selectotdel', '/basis/address/selectotdel/', 'AddressController:selectotdel', 'POST');

// SUBJECT Routes (POST)
$this->router->add('subject', '/basis/subject/', 'SubjectController:search');
$this->router->add('subject-list', '/basis/subject/list/', 'SubjectController:listing');
$this->router->add('subject-list_subject', '/basis/unp/list_subject/(id:int)', 'SubjectController:listing_subject');
$this->router->add('subject-list-filter', '/basis/filter/filterlist/', 'FilterController:filterlist', 'POST');
$this->router->add('object-list-filter', '/basis/filter/filterlistobjects/', 'FilterController:filterlistobjects', 'POST');

$this->router->add('subject-create', '/basis/subject/create/', 'SubjectController:create');
$this->router->add('subject-create-unp', '/basis/subject/create/(id:int)', 'SubjectController:create');
$this->router->add('subject-edit', '/basis/subject/edit/(id:int)', 'SubjectController:edit');
$this->router->add('subject-info', '/basis/subject/info/(id:int)', 'SubjectController:info', 'POST');
$this->router->add('subject-add', '/basis/subject/add/', 'SubjectController:add', 'POST');
$this->router->add('subject-update', '/basis/subject/update/', 'SubjectController:update', 'POST');
$this->router->add('subject-remove-item', '/basis/subject/removeItem/', 'SubjectController:removeItem', 'POST');
$this->router->add('subj_god-add', '/basis/subject/add_subj_dog/', 'SubjectController:add_subj_dog', 'POST');
$this->router->add('subject-remove-item-table', '/basis/subject/removeTableItem/', 'SubjectController:removeObjTableRow', 'POST');
$this->router->add('subject-get-unp', '/basis/subject/getUnpforOtv/', 'SubjectController:getUnpforOtv', 'POST');
$this->router->add('subject-get-info', '/basis/subject/insertInfoOtv/', 'SubjectController:insertInfoOtv', 'POST');
$this->router->add('subj_otv-add', '/basis/subject/add_otv_eh_sob/', 'SubjectController:add_otv_eh_sob', 'POST');
$this->router->add('subj_otv_t-add', '/basis/subject/add_otv_th_sob/', 'SubjectController:add_otv_th_sob', 'POST');
$this->router->add('subject-clear-item-table', '/basis/subject/clearTableItem/', 'SubjectController:clearObjTableRow', 'POST');

// SEARCH Routes (POST)
$this->router->add('search-short', '/basis/search/', 'SearchController:search', 'POST');

// ADDRESS Routes (POST)
$this->router->add('type_property-selectdepartment', '/basis/type_property/selectdepartment/', 'TypePropertyController:SelectDepartment', 'POST');

// OBJECT Routes (POST)
$this->router->add('objects', '/basis/objects/', 'ObjectsController:search');
$this->router->add('objects-list', '/basis/objects/list/(id:int)', 'ObjectsController:listing');
$this->router->add('objects-create', '/basis/objects/create/(id:int)', 'ObjectsController:create');
$this->router->add('objects-edit', '/basis/objects/edit/(id:int)', 'ObjectsController:edit');
$this->router->add('objects-info', '/basis/objects/info/(id:int)', 'ObjectsController:info', 'POST');
$this->router->add('objects-add', '/basis/objects/add/', 'ObjectsController:add', 'POST');
$this->router->add('objects-addEmpty', '/basis/objects/addEmpty/', 'ObjectsController:createEmpty', 'POST');
$this->router->add('objects-cancel', '/basis/objects/cancel/', 'ObjectsController:cancel', 'POST');
$this->router->add('objects-boiler-water-add', '/basis/objects/add_boiler_water/', 'ObjectsController:add_boiler_water', 'POST');
$this->router->add('objects-boiler-vapor-add', '/basis/objects/add_boiler_vapor/', 'ObjectsController:add_boiler_vapor', 'POST');
$this->router->add('objects-device-add', '/basis/objects/add_og_device/', 'ObjectsController:add_og_device', 'POST');
/*this->router->add('objects_otv_g-add', '/basis/objects/add_otv_gh_sob/', 'ObjectsController:add_otv_gh_sob', 'POST');*/

$this->router->add('objects-og-obsl-add', '/basis/objects/add_og_obsl/', 'ObjectsController:add_og_obsl', 'POST');
$this->router->add('objects-og-accidents-add', '/basis/objects/add_og_accidents/', 'ObjectsController:add_og_accidents', 'POST');

$this->router->add('objects-personal_tp', '/basis/objects/add_ot_personal_tp/', 'ObjectsController:add_ot_personal_tp', 'POST');
$this->router->add('objects-personal_sar', '/basis/objects/add_ot_personal_sar/', 'ObjectsController:add_ot_personal_sar', 'POST');
$this->router->add('objects-heat_source', '/basis/objects/add_ot_heat_source/', 'ObjectsController:add_ot_heat_source', 'POST');
$this->router->add('objects-heatnet-add', '/basis/objects/add_ot_heatnet/', 'ObjectsController:add_ot_heatnet', 'POST');
$this->router->add('objects-heatnet-t-add', '/basis/objects/add_ot_heatnet_t/', 'ObjectsController:add_ot_heatnet_t', 'POST');
$this->router->add('objects-avr-add', '/basis/objects/add_obj_oe_avr/', 'ObjectsController:add_obj_oe_avr', 'POST');
$this->router->add('objects-aie-add', '/basis/objects/add_obj_oe_aie/', 'ObjectsController:add_obj_oe_aie', 'POST');
$this->router->add('objects-tp-add', '/basis/objects/add_obj_oe_trp/', 'ObjectsController:add_obj_oe_trp', 'POST');
$this->router->add('objects-tepl_kot-add', '/basis/objects/add_obj_ot_tepl_kot/', 'ObjectsController:add_obj_ot_tepl_kot', 'POST');
$this->router->add('objects-teploobmennik_gvs-add', '/basis/objects/add_obj_ot_teploobmennik_gvs/', 'ObjectsController:add_obj_ot_teploobmennik_gvs', 'POST');
$this->router->add('objects-teploobmennik_so-add', '/basis/objects/add_obj_ot_teploobmennik_so/', 'ObjectsController:add_obj_ot_teploobmennik_so', 'POST');
$this->router->add('objects-klvl-add', '/basis/objects/add_obj_oe_klvl/', 'ObjectsController:add_obj_oe_klvl', 'POST');
$this->router->add('objects-block-add', '/basis/objects/add_obj_oe_block/', 'ObjectsController:add_obj_oe_block', 'POST');
$this->router->add('objects-vvd-add', '/basis/objects/add_obj_oe_vvd/', 'ObjectsController:add_obj_oe_vvd', 'POST');
$this->router->add('objects-ek-add', '/basis/objects/add_obj_oe_ek/', 'ObjectsController:add_obj_oe_ek', 'POST');
$this->router->add('objects-ku-add', '/basis/objects/add_obj_oe_ku/', 'ObjectsController:add_obj_oe_ku', 'POST');
$this->router->add('objects-prit_vent-add', '/basis/objects/add_obj_ot_prit_vent/', 'ObjectsController:add_obj_ot_prit_vent', 'POST');
$this->router->add('objects-update', '/basis/objects/update/', 'ObjectsController:update', 'POST');
$this->router->add('objects-user-list', '/basis/objects/usersList/', 'ObjectsController:usersList', 'POST');
$this->router->add('objects-remove-item', '/basis/objects/removeItem/', 'ObjectsController:removeItem', 'POST');
$this->router->add('objects-remove-item-table', '/basis/objects/removeTableItem/', 'ObjectsController:removeObjTableRow', 'POST');
$this->router->add('objects-new-sbj', '/basis/objects/new_sbj/', 'ObjectsController:newSbj', 'POST'); // передача объекта другому потребителю
$this->router->add('objects-for-new-insp', '/basis/objects/getObjsForTransfer/', 'ObjectsController:getObjsForTransfer', 'POST'); // выборка объектов для передачи другому инпектору
$this->router->add('objects-new-insp', '/basis/objects/new_insp/', 'ObjectsController:newInsp', 'POST'); // выборка объектов для передачи другому инпектору

/// API

//Guides Routes;

$this->router->add('guides-list', '/basis/guides/list/', 'GuidesController:listing');
$this->router->add('guides-list-post', '/basis/guides/list/', 'GuidesController:listing','POST');
$this->router->add('type_street-add', '/basis/guides/add_type_street/', 'GuidesController:add_type_street', 'POST');
$this->router->add('type_property-add', '/basis/guides/add_type_property/', 'GuidesController:add_type_property', 'POST');
$this->router->add('type_city-add', '/basis/guides/add_type_city/', 'GuidesController:add_type_city', 'POST');
$this->router->add('shift_of_work-add', '/basis/guides/add_shift_of_work/', 'GuidesController:add_shift_of_work', 'POST');
$this->router->add('ot_type_to-add', '/basis/guides/add_ot_type_to/', 'GuidesController:add_ot_type_to', 'POST');
$this->router->add('ot_type_heat_source-add', '/basis/guides/add_ot_type_heat_source/', 'GuidesController:add_ot_type_heat_source', 'POST');
$this->router->add('ot_systemheat_water-add', '/basis/guides/add_ot_systemheat_water/', 'GuidesController:add_ot_systemheat_water', 'POST');
$this->router->add('ot_systemheat_dependent-add', '/basis/guides/add_ot_systemheat_dependent/', 'GuidesController:add_ot_systemheat_dependent', 'POST');
$this->router->add('ot_heatnet_type_underground-add', '/basis/guides/add_ot_heatnet_type_underground/', 'GuidesController:add_ot_heatnet_type_underground', 'POST');
$this->router->add('ot_gvs_open-add', '/basis/guides/add_ot_gvs_open/', 'GuidesController:add_ot_gvs_open', 'POST');
$this->router->add('ot_gvs_in-add', '/basis/guides/add_ot_gvs_in/', 'GuidesController:add_ot_gvs_in', 'POST');
$this->router->add('oti_boiler_type-add', '/basis/guides/add_oti_boiler_type/', 'GuidesController:add_oti_boiler_type', 'POST');
$this->router->add('og_type_home-add', '/basis/guides/add_og_type_home/', 'GuidesController:add_og_type_home', 'POST');
$this->router->add('oe_energy_type-add', '/basis/guides/add_oe_energy_type/', 'GuidesController:add_oe_energy_type', 'POST');
$this->router->add('oe_category_line-add', '/basis/guides/add_oe_category_line/', 'GuidesController:add_oe_category_line', 'POST');
$this->router->add('kind_of_activity-add', '/basis/guides/add_kind_of_activity/', 'GuidesController:add_kind_of_activity', 'POST');
$this->router->add('ot_heatnet_type_iso-add', '/basis/guides/add_ot_heatnet_type_iso/', 'GuidesController:add_ot_heatnet_type_iso', 'POST');
$this->router->add('ot_functions-add', '/basis/guides/add_ot_functions/', 'GuidesController:add_ot_functions', 'POST');
$this->router->add('ot_cat-add', '/basis/guides/add_ot_cat/', 'GuidesController:add_ot_cat', 'POST');
$this->router->add('oti_type_fuel-add', '/basis/guides/add_oti_type_fuel/', 'GuidesController:add_oti_type_fuel', 'POST');
$this->router->add('oti_type_fuel_rezerv-add', '/basis/guides/add_oti_type_fuel_rezerv/', 'GuidesController:add_oti_type_fuel_rezerv', 'POST');
$this->router->add('og_type_gaz-add', '/basis/guides/add_og_type_gaz/', 'GuidesController:add_og_type_gaz', 'POST');
$this->router->add('og_flue_mater-add', '/basis/guides/add_og_flue_mater/', 'GuidesController:add_og_flue_mater', 'POST');
$this->router->add('og_flue-add', '/basis/guides/add_og_flue/', 'GuidesController:add_og_flue', 'POST');
$this->router->add('og_device_type-add', '/basis/guides/add_og_device_type/', 'GuidesController:add_og_device_type', 'POST');
$this->router->add('og_to_gaz-add', '/basis/guides/add_og_to_gaz/', 'GuidesController:add_og_to_gaz', 'POST');
$this->router->add('og_obsl_go-add', '/basis/guides/add_og_obsl_go/', 'GuidesController:add_og_obsl_go', 'POST');
$this->router->add('og_accidents', '/basis/guides/add_og_accidents/', 'GuidesController:add_og_accidents', 'POST');
$this->router->add('oe_klvl_volt-add', '/basis/guides/add_oe_klvl_volt/', 'GuidesController:add_oe_klvl_volt', 'POST');
$this->router->add('oe_klvl_type-add', '/basis/guides/add_oe_klvl_type/', 'GuidesController:add_oe_klvl_type', 'POST');
$this->router->add('region-add', '/basis/guides/add_region/', 'GuidesController:add_region', 'POST');
$this->router->add('district-add', '/basis/guides/add_district/', 'GuidesController:add_district', 'POST');
$this->router->add('admin-add', '/basis/guides/add_admin/', 'GuidesController:add_admin', 'POST');
$this->router->add('branch-add', '/basis/guides/add_branch/', 'GuidesController:add_branch', 'POST');
$this->router->add('department-add', '/basis/guides/add_department/', 'GuidesController:add_department', 'POST');
$this->router->add('city-add', '/basis/guides/add_city/', 'GuidesController:add_city', 'POST');
$this->router->add('adminBycity-add', '/basis/guides/add_adminBycity/', 'GuidesController:add_adminBycity', 'POST');
$this->router->add('regionBycity-add', '/basis/guides/add_regionBycity/', 'GuidesController:add_regionBycity', 'POST');
$this->router->add('districtBycity-add', '/basis/guides/add_districtBycity/', 'GuidesController:add_districtBycity', 'POST');
$this->router->add('adminBydistrict-add', '/basis/guides/add_adminBydistrict/', 'GuidesController:add_adminBydistrict', 'POST');
$this->router->add('city_zone-add', '/basis/guides/add_city_zone/', 'GuidesController:add_city_zone', 'POST');
$this->router->add('otdel-add', '/basis/guides/add_otdel/', 'GuidesController:add_otdel', 'POST');
$this->router->add('podrazdelenie-add', '/basis/guides/add_podrazdelenie/', 'GuidesController:add_podrazdelenie', 'POST');
$this->router->add('ot_type_izo-add', '/basis/guides/add_ot_type_izol/', 'GuidesController:add_ot_type_izol', 'POST');
$this->router->add('ot_type_ot_pribor-add', '/basis/guides/add_ot_type_ot_pribor/', 'GuidesController:add_ot_type_ot_pribor', 'POST');
$this->router->add('ot_type_razvodka-add', '/basis/guides/add_ot_type_razvodka/', 'GuidesController:add_ot_type_razvodka', 'POST');
$this->router->add('ot_nazn_sar-add', '/basis/guides/add_ot_nazn_sar/', 'GuidesController:add_ot_nazn_sar', 'POST');
$this->router->add('guides-remove-item', '/basis/guides/removeItem/', 'GuidesController:removeItem', 'POST');
$this->router->add('category_line-add', '/basis/guides/add_category_line/', 'GuidesController:add_category_line', 'POST');
$this->router->add('diametr_tube-add', '/basis/guides/add_diametr_tube/', 'GuidesController:add_diametr_tube', 'POST');
$this->router->add('type_object-add', '/basis/guides/add_type_object/', 'GuidesController:add_type_object', 'POST');
$this->router->add('podrazdel-add', '/basis/guides/add_podrazdel/', 'GuidesController:add_podrazdel', 'POST');
$this->router->add('units_power-addц', '/basis/guides/add_units_power/', 'GuidesController:add_units_power', 'POST');
$this->router->add('type_otv-add', '/basis/guides/add_type_otv/', 'GuidesController:add_type_otv', 'POST');

//Filter Routes;
$this->router->add('filter-users', '/basis/filter/users/', 'FilterController:usersbyotdel', 'POST');
$this->router->add('filter-otdels', '/basis/filter/otdels/', 'FilterController:otdelbypodrazd', 'POST');
$this->router->add('filter-branch', '/basis/filter/podrazd/', 'FilterController:podrazdbybranch', 'POST');
$this->router->add('mf-filter-unp', '/basis/filter/mf_unp/', 'FilterController:mf_unp', 'POST');
$this->router->add('mf-filter-inspection_type', '/basis/filter/inspection_type/', 'FilterController:inspection_type', 'POST');
$this->router->add('mf-filter-object-page', '/basis/filter/', 'FilterController:mf_object_page');
$this->router->add('mf-filter-object', '/basis/filter/mf_object/', 'FilterController:mf_object', 'POST');
$this->router->add('mf-filter-items_for_pagination', '/basis/filter/count_items_for_pagination/', 'FilterController:count_items_for_pagination', 'POST');
$this->router->add('mf-filter-subject', '/basis/filter/mf_subject/', 'FilterController:mf_subject', 'POST');
$this->router->add('mf-filter-indpers', '/basis/filter/mf_indpers/', 'FilterController:mf_indpers', 'POST');



//Report Routes;
$this->router->add('report-subject-filter', '/basis/report/subjectfilter/', 'ReportController:report_subject_filter', 'POST');
$this->router->add('report-letter-filter', '/basis/report/letterfilter/', 'ReportController:report_letter_filter', 'POST');
$this->router->add('report-unp-filter', '/basis/report/unpfilter/', 'ReportController:report_unp_filter', 'POST');
$this->router->add('report-indpers-filter', '/basis/report/indpersfilter/', 'ReportController:report_indpers_filter', 'POST');

//personal
$this->router->add('personal', '/basis/personal/', 'PersonalController:search');
$this->router->add('personal-list', '/basis/personal/list/(id:int)', 'PersonalController:listing');
$this->router->add('personal-create', '/basis/personal/create/', 'PersonalController:create');
$this->router->add('personal-create-unp', '/basis/personal/create/(id:int)', 'PersonalController:create');
$this->router->add('personal-edit', '/basis/personal/edit/(id:int)', 'PersonalController:edit');
$this->router->add('personal-add', '/basis/personal/add/', 'PersonalController:add', 'POST');
$this->router->add('personal-update', '/basis/personal/update/', 'PersonalController:update', 'POST');
$this->router->add('personal-remove-item', '/basis/personal/removeItem/', 'PersonalController:removeItem', 'POST');
$this->router->add('personal-info', '/basis/personal/info/(id:int)', 'PersonalController:info', 'POST');
$this->router->add('personal-listpers', '/basis/personal/ListRespPers/', 'PersonalController:ListPers', 'POST');
$this->router->add('personal-srok', '/basis/personal/srok/', 'PersonalController:srok');

//individual_persons
$this->router->add('individual_persons', '/basis/individual_persons/', 'Individual_personsController:search');
$this->router->add('individual_persons-list', '/basis/individual_persons/list/(id:int)', 'Individual_personsController:listing');
$this->router->add('individual_persons-create', '/basis/individual_persons/create/', 'Individual_personsController:create');
$this->router->add('individual_persons-create-unp', '/basis/individual_persons/create/(id:int)', 'Individual_personsController:create');
$this->router->add('individual_persons-edit', '/basis/individual_persons/edit/(id:int)', 'Individual_personsController:edit');
$this->router->add('individual_persons-add', '/basis/individual_persons/add/', 'Individual_personsController:add', 'POST');
$this->router->add('individual_persons-update', '/basis/individual_persons/update/', 'Individual_personsController:update', 'POST');
$this->router->add('individual_persons-remove-item', '/basis/individual_persons/removeItem/', 'Individual_personsController:removeItem', 'POST');
$this->router->add('individual_persons-info', '/basis/individual_persons/info/(id:int)', 'Individual_personsController:info', 'POST');
$this->router->add('individual_persons-listpers', '/basis/individual_persons/ListRespPers/', 'Individual_personsController:ListPers', 'POST');
$this->router->add('individual_persons-check-sbj', '/basis/individual_persons/checkSbj/', 'Individual_personsController:findSbj', 'POST');
$this->router->add('individual_persons-reestr', '/basis/individual_persons/reestr/', 'Individual_personsController:reestr');

//TABS
$this->router->add('tabs-create', '/basis/tabs/create/', 'TabsController:create', 'POST');
$this->router->add('tabs-update', '/basis/tabs/update/', 'TabsController:update', 'POST');
$this->router->add('tabs-delete', '/basis/tabs/delete/', 'TabsController:delete', 'POST');

$this->router->add('info', '/basis/information/', 'InformationController:info');
$this->router->add('docs', '/basis/information/docs/', 'InformationController:docs');

//FILTER PERSONAL
$this->router->add('mf-filter-zurnal-personal', '/basis/filter/mf_zurnal/', 'FilterController:mf_zurnal', 'POST');
//LETTER
$this->router->add('report-letter_srok', '/basis/report/letter_srok/', 'ReportController:letter_srok', 'POST');
