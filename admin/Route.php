<?php
/**
 * List of routes in the Admin environment
 */

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('pre-auth', '/admin/preAuth/', 'LoginController:preAuth', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');

// Pages Account ()
$this->router->add('account', '/admin/account/', 'AccountController:account');

// Settings Routes (GET)
$this->router->add('settings-general', '/admin/settings/general/', 'SettingController:general');
$this->router->add('settings-menus', '/admin/settings/appearance/menus/', 'SettingController:menus');

$this->router->add('home', '/', 'HomeController:index');

// Pages Routes (POST)
/* $this->router->add('setting-update', '/admin/settings/update/', 'SettingController:updateSetting', 'POST');
$this->router->add('setting-add-menu', '/admin/setting/ajaxMenuAdd/', 'SettingController:ajaxMenuAdd', 'POST');
$this->router->add('setting-add-menu-item', '/admin/setting/ajaxMenuAddItem/', 'SettingController:ajaxMenuAddItem', 'POST');
$this->router->add('setting-sort-menu-item', '/admin/setting/ajaxMenuSortItems/', 'SettingController:ajaxMenuSortItems', 'POST');
$this->router->add('setting-remove-menu-item', '/admin/setting/ajaxMenuRemoveItem/', 'SettingController:ajaxMenuRemoveItem', 'POST');
$this->router->add('setting-update-menu-item', '/admin/setting/ajaxMenuUpdateItem/', 'SettingController:ajaxMenuUpdateItem', 'POST'); */

// UNP Routes (POST)
/* $this->router->add('unp', '/basis/unp/', 'UnpController:search');
$this->router->add('unp-list', '/basis/unp/list/', 'UnpController:listing');
$this->router->add('unp-create', '/basis/unp/create/', 'UnpController:create');
$this->router->add('unp-edit', '/basis/unp/edit/(id:int)', 'UnpController:edit');
$this->router->add('unp-add', '/basis/unp/add/', 'UnpController:add', 'POST');
$this->router->add('unp-update', '/basis/unp/update/', 'UnpController:update', 'POST');
$this->router->add('unp-remove-item', '/basis/unp/removeItem/', 'UnpController:removeItem', 'POST');
$this->router->add('unp-info', '/basis/unp/info/(id:int)', 'UnpController:info', 'POST');
$this->router->add('unp-portal', '/basis/unp/portalinfo/', 'UnpController:getPortal', 'POST'); */

// REGION Routes (POST)
/* $this->router->add('region', '/admin/region/', 'RegionController:listing');
$this->router->add('region-create', '/admin/region/create/', 'RegionController:create');
$this->router->add('region-edit', '/admin/region/edit/(id:int)', 'RegionController:edit');
$this->router->add('region-add', '/admin/region/add/', 'RegionController:add', 'POST');
$this->router->add('region-update', '/admin/region/update/', 'RegionController:update', 'POST'); */

// ADDRESS Routes (POST)
/* $this->router->add('address-selectdistrict', '/admin/address/selectdistrict/', 'AddressController:SelectDistrict', 'POST');
$this->router->add('address-selectcity', '/admin/address/selectcity/', 'AddressController:SelectCity', 'POST');
$this->router->add('address-selectcityzone', '/admin/address/selectcityzone/', 'AddressController:SelectCityZone', 'POST');

$this->router->add('address-selectpodrazdelenie', '/admin/address/selectpodrazdelenie/', 'AddressController:selectpodrazdelenie', 'POST');
$this->router->add('address-selectotdel', '/admin/address/selectotdel/', 'AddressController:selectotdel', 'POST');
 */
// SUBJECT Routes (POST)
/* $this->router->add('subject', '/admin/subject/', 'SubjectController:search');
$this->router->add('subject-list', '/admin/subject/list/', 'SubjectController:listing');
$this->router->add('subject-list_subject', '/admin/unp/list_subject/(id:int)', 'SubjectController:listing_subject');
$this->router->add('subject-list-filter', '/admin/filter/filterlist/', 'FilterController:filterlist', 'POST');

$this->router->add('subject-create', '/admin/subject/create/', 'SubjectController:create');
$this->router->add('subject-create-unp', '/admin/subject/create/(id:int)', 'SubjectController:create');
$this->router->add('subject-edit', '/admin/subject/edit/(id:int)', 'SubjectController:edit');
$this->router->add('subject-info', '/admin/subject/info/(id:int)', 'SubjectController:info', 'POST');
$this->router->add('subject-add', '/admin/subject/add/', 'SubjectController:add', 'POST');
$this->router->add('subject-update', '/admin/subject/update/', 'SubjectController:update', 'POST');
$this->router->add('subject-remove-item', '/admin/subject/removeItem/', 'SubjectController:removeItem', 'POST'); */


// SEARCH Routes (POST)
/* $this->router->add('search-short', '/admin/search/', 'SearchController:search', 'POST');
 */
// ADDRESS Routes (POST)
/* $this->router->add('type_property-selectdepartment', '/admin/type_property/selectdepartment/', 'TypePropertyController:SelectDepartment', 'POST');
 */
// OBJECT Routes (POST)
/* $this->router->add('objects', '/admin/objects/', 'ObjectsController:search');
$this->router->add('objects-list', '/admin/objects/list/(id:int)', 'ObjectsController:listing');
$this->router->add('objects-create', '/admin/objects/create/(id:int)', 'ObjectsController:create');
$this->router->add('objects-edit', '/admin/objects/edit/(id:int)', 'ObjectsController:edit');
$this->router->add('objects-info', '/admin/objects/info/(id:int)', 'ObjectsController:info', 'POST');
$this->router->add('objects-add', '/admin/objects/add/', 'ObjectsController:add', 'POST');
$this->router->add('objects-cancel', '/admin/objects/cancel/', 'ObjectsController:cancel', 'POST');
$this->router->add('objects-boiler-water-add', '/admin/objects/add_boiler_water/', 'ObjectsController:add_boiler_water', 'POST');
$this->router->add('objects-boiler-vapor-add', '/admin/objects/add_boiler_vapor/', 'ObjectsController:add_boiler_vapor', 'POST');
$this->router->add('objects-device-add', '/admin/objects/add_og_device/', 'ObjectsController:add_og_device', 'POST');
$this->router->add('objects-personal_tp', '/admin/objects/add_ot_personal_tp/', 'ObjectsController:add_ot_personal_tp', 'POST');
$this->router->add('objects-personal_sar', '/admin/objects/add_ot_personal_sar/', 'ObjectsController:add_ot_personal_sar', 'POST');
$this->router->add('objects-heat_source', '/admin/objects/add_ot_heat_source/', 'ObjectsController:add_ot_heat_source', 'POST');
$this->router->add('objects-heatnet-add', '/admin/objects/add_ot_heatnet/', 'ObjectsController:add_ot_heatnet', 'POST');
$this->router->add('objects-heatnet-t-add', '/admin/objects/add_ot_heatnet_t/', 'ObjectsController:add_ot_heatnet_t', 'POST');
$this->router->add('objects-avr-add', '/admin/objects/add_obj_oe_avr/', 'ObjectsController:add_obj_oe_avr', 'POST');
$this->router->add('objects-aie-add', '/admin/objects/add_obj_oe_aie/', 'ObjectsController:add_obj_oe_aie', 'POST');
$this->router->add('objects-tp-add', '/admin/objects/add_obj_oe_trp/', 'ObjectsController:add_obj_oe_trp', 'POST');
$this->router->add('objects-klvl-add', '/admin/objects/add_obj_oe_klvl/', 'ObjectsController:add_obj_oe_klvl', 'POST');
$this->router->add('objects-block-add', '/admin/objects/add_obj_oe_block/', 'ObjectsController:add_obj_oe_block', 'POST');
$this->router->add('objects-update', '/admin/objects/update/', 'ObjectsController:update', 'POST');
$this->router->add('objects-user-list', '/admin/objects/usersList/', 'ObjectsController:usersList', 'POST');
$this->router->add('objects-remove-item', '/admin/objects/removeItem/', 'ObjectsController:removeItem', 'POST');
$this->router->add('objects-remove-item-table', '/admin/objects/removeTableItem/', 'ObjectsController:removeObjTableRow', 'POST'); */

/// API

//Guides Routes;
/* 
$this->router->add('guides-list', '/admin/guides/list/', 'GuidesController:listing');
$this->router->add('guides-list-post', '/admin/guides/list/', 'GuidesController:listing','POST');
$this->router->add('type_street-add', '/admin/guides/add_type_street/', 'GuidesController:add_type_street', 'POST');
$this->router->add('type_property-add', '/admin/guides/add_type_property/', 'GuidesController:add_type_property', 'POST');
$this->router->add('type_city-add', '/admin/guides/add_type_city/', 'GuidesController:add_type_city', 'POST');
$this->router->add('shift_of_work-add', '/admin/guides/add_shift_of_work/', 'GuidesController:add_shift_of_work', 'POST');
$this->router->add('ot_type_to-add', '/admin/guides/add_ot_type_to/', 'GuidesController:add_ot_type_to', 'POST');
$this->router->add('ot_type_heat_source-add', '/admin/guides/add_ot_type_heat_source/', 'GuidesController:add_ot_type_heat_source', 'POST');
$this->router->add('ot_systemheat_water-add', '/admin/guides/add_ot_systemheat_water/', 'GuidesController:add_ot_systemheat_water', 'POST');
$this->router->add('ot_systemheat_dependent-add', '/admin/guides/add_ot_systemheat_dependent/', 'GuidesController:add_ot_systemheat_dependent', 'POST');
$this->router->add('ot_heatnet_type_underground-add', '/admin/guides/add_ot_heatnet_type_underground/', 'GuidesController:add_ot_heatnet_type_underground', 'POST');
$this->router->add('ot_gvs_open-add', '/admin/guides/add_ot_gvs_open/', 'GuidesController:add_ot_gvs_open', 'POST');
$this->router->add('ot_gvs_in-add', '/admin/guides/add_ot_gvs_in/', 'GuidesController:add_ot_gvs_in', 'POST');
$this->router->add('oti_boiler_type-add', '/admin/guides/add_oti_boiler_type/', 'GuidesController:add_oti_boiler_type', 'POST');
$this->router->add('og_type_home-add', '/admin/guides/add_og_type_home/', 'GuidesController:add_og_type_home', 'POST');
$this->router->add('oe_energy_type-add', '/admin/guides/add_oe_energy_type/', 'GuidesController:add_oe_energy_type', 'POST');
$this->router->add('kind_of_activity-add', '/admin/guides/add_kind_of_activity/', 'GuidesController:add_kind_of_activity', 'POST');
$this->router->add('ot_heatnet_type_iso-add', '/admin/guides/add_ot_heatnet_type_iso/', 'GuidesController:add_ot_heatnet_type_iso', 'POST');
$this->router->add('ot_functions-add', '/admin/guides/add_ot_functions/', 'GuidesController:add_ot_functions', 'POST');
$this->router->add('ot_cat-add', '/admin/guides/add_ot_cat/', 'GuidesController:add_ot_cat', 'POST');
$this->router->add('oti_type_fuel-add', '/admin/guides/add_oti_type_fuel/', 'GuidesController:add_oti_type_fuel', 'POST');
$this->router->add('oti_type_fuel_rezerv-add', '/admin/guides/add_oti_type_fuel_rezerv/', 'GuidesController:add_oti_type_fuel_rezerv', 'POST');
$this->router->add('og_type_gaz-add', '/admin/guides/add_og_type_gaz/', 'GuidesController:add_og_type_gaz', 'POST');
$this->router->add('og_flue_mater-add', '/admin/guides/add_og_flue_mater/', 'GuidesController:add_og_flue_mater', 'POST');
$this->router->add('og_flue-add', '/admin/guides/add_og_flue/', 'GuidesController:add_og_flue', 'POST');
$this->router->add('og_device_type-add', '/admin/guides/add_og_device_type/', 'GuidesController:add_og_device_type', 'POST');
$this->router->add('oe_klvl_volt-add', '/admin/guides/add_oe_klvl_volt/', 'GuidesController:add_oe_klvl_volt', 'POST');
$this->router->add('oe_klvl_type-add', '/admin/guides/add_oe_klvl_type/', 'GuidesController:add_oe_klvl_type', 'POST');
$this->router->add('region-add', '/admin/guides/add_region/', 'GuidesController:add_region', 'POST');
$this->router->add('district-add', '/admin/guides/add_district/', 'GuidesController:add_district', 'POST');
$this->router->add('admin-add', '/admin/guides/add_admin/', 'GuidesController:add_admin', 'POST');
$this->router->add('branch-add', '/admin/guides/add_branch/', 'GuidesController:add_branch', 'POST');
$this->router->add('department-add', '/admin/guides/add_department/', 'GuidesController:add_department', 'POST');
$this->router->add('city-add', '/admin/guides/add_city/', 'GuidesController:add_city', 'POST');
$this->router->add('adminBycity-add', '/admin/guides/add_adminBycity/', 'GuidesController:add_adminBycity', 'POST');
$this->router->add('regionBycity-add', '/admin/guides/add_regionBycity/', 'GuidesController:add_regionBycity', 'POST');
$this->router->add('districtBycity-add', '/admin/guides/add_districtBycity/', 'GuidesController:add_districtBycity', 'POST');
$this->router->add('adminBydistrict-add', '/admin/guides/add_adminBydistrict/', 'GuidesController:add_adminBydistrict', 'POST');
$this->router->add('city_zone-add', '/admin/guides/add_city_zone/', 'GuidesController:add_city_zone', 'POST');
$this->router->add('otdel-add', '/admin/guides/add_otdel/', 'GuidesController:add_otdel', 'POST');
$this->router->add('podrazdelenie-add', '/admin/guides/add_podrazdelenie/', 'GuidesController:add_podrazdelenie', 'POST');
$this->router->add('ot_type_izo-add', '/admin/guides/add_ot_type_izol/', 'GuidesController:add_ot_type_izol', 'POST');
$this->router->add('ot_type_ot_pribor-add', '/admin/guides/add_ot_type_ot_pribor/', 'GuidesController:add_ot_type_ot_pribor', 'POST');
$this->router->add('ot_type_razvodka-add', '/admin/guides/add_ot_type_razvodka/', 'GuidesController:add_ot_type_razvodka', 'POST');
$this->router->add('ot_nazn_sar-add', '/admin/guides/add_ot_nazn_sar/', 'GuidesController:add_ot_nazn_sar', 'POST');
$this->router->add('guides-remove-item', '/admin/guides/removeItem/', 'GuidesController:removeItem', 'POST'); */

//Filter Routes;
/* $this->router->add('filter-users', '/admin/filter/users/', 'FilterController:usersbyotdel', 'POST');
$this->router->add('filter-otdels', '/admin/filter/otdels/', 'FilterController:otdelbypodrazd', 'POST');
$this->router->add('filter-branch', '/admin/filter/podrazd/', 'FilterController:podrazdbybranch', 'POST');
$this->router->add('mf-filter-unp', '/admin/filter/mf_unp/', 'FilterController:mf_unp', 'POST');
$this->router->add('mf-filter-object-page', '/admin/filter/', 'FilterController:mf_object_page');
$this->router->add('mf-filter-object', '/admin/filter/mf_object/', 'FilterController:mf_object', 'POST');
$this->router->add('mf-filter-items_for_pagination', '/admin/filter/count_items_for_pagination/', 'FilterController:count_items_for_pagination', 'POST');
$this->router->add('mf-filter-subject', '/admin/filter/mf_subject/', 'FilterController:mf_subject', 'POST'); */
//Report Routes;
/* $this->router->add('report-subject-filter', '/admin/report/subjectfilter/', 'ReportController:report_subject_filter', 'POST'); */



//responsible_persons
/* $this->router->add('responsible_persons', '/admin/responsible_persons/', 'ResponsiblePersonsController:search');
$this->router->add('responsible_persons-list', '/admin/responsible_persons/list/(id:int)', 'ResponsiblePersonsController:listing');
$this->router->add('responsible_persons-create', '/admin/responsible_persons/create/', 'ResponsiblePersonsController:create');
$this->router->add('responsible_persons-create-unp', '/admin/responsible_persons/create/(id:int)', 'ResponsiblePersonsController:create');
$this->router->add('responsible_persons-edit', '/admin/responsible_persons/edit/(id:int)', 'ResponsiblePersonsController:edit');
$this->router->add('responsible_persons-add', '/admin/responsible_persons/add/', 'ResponsiblePersonsController:add', 'POST');
$this->router->add('responsible_persons-update', '/admin/responsible_persons/update/', 'ResponsiblePersonsController:update', 'POST');
$this->router->add('responsible_persons-remove-item', '/admin/responsible_persons/removeItem/', 'ResponsiblePersonsController:removeItem', 'POST');
$this->router->add('responsible_persons-info', '/admin/responsible_persons/info/(id:int)', 'ResponsiblePersonsController:info', 'POST');
$this->router->add('responsible_persons-listpers', '/admin/responsible_persons/ListRespPers/', 'ResponsiblePersonsController:ListPers', 'POST'); */