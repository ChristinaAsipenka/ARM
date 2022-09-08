<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3><?= $unp['name']." (" . $unp['unp'] .")" ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
                        <input type="hidden" name="unp_id" id="formUnpId" value="<?= $unp['id'] ?>">
						<div class="form-group">
                            <label for="formTitle">УНП:</label>
                            <input type="text" name="unp" class="form-control" id="formUNP" value="<?= $unp['unp'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Наименование:</label>
                            <input type="text" name="unpName" class="form-control" id="formName" value="<?= $unp['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="formTitle">Краткое наименование:</label>
                            <input type="text" name="shortName" class="form-control" id="formShortName" value="<?= $unp['name'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Индекс:</label>
                            <input type="text" name="index" class="form-control" id="formIndex" value="<?= $unp['address_index'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Область:</label>
                            <input type="text" name="regionName" class="form-control" id="formRegion" value="<?= $unp['address_region'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Район:</label>
                            <input type="text" name="districtName" class="form-control" id="formDistrict" value="<?= $unp['address_district'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Город:</label>
                            <input type="text" name="cityName" class="form-control" id="formCity" value="<?= $unp['address_city'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Район города:</label>
                            <input type="text" name="cityZone" class="form-control" id="formCityZone" value="<?= $unp['address_city_zone'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Улица:</label>
                            <input type="text" name="streetName" class="form-control" id="formStreet" value="<?= $unp['address_street'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Дом/строение:</label>
                            <input type="text" name="buildingNumber" class="form-control" id="formBuilding" value="<?= $unp['address_building'] ?>">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Квартира:</label>
                            <input type="text" name="flatNumber" class="form-control" id="formFlat" value="<?= $unp['address_flat'] ?>">
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <div>
                        <button type="submit" class="btn btn-primary" onclick="unp.update()">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>