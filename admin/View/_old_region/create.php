<?php $this->theme->header(); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col page-title">
                    <h3>Регистрация нового УНП</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form id="formPage">
						<div class="form-group">
                            <label for="formTitle">УНП:</label>
                            <input type="text" name="unp" class="form-control" id="formUNP">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Наименование:</label>
                            <input type="text" name="unpName" class="form-control" id="formName">
                        </div>
                        <div class="form-group">
                            <label for="formTitle">Краткое наименование:</label>
                            <input type="text" name="shortName" class="form-control" id="formShortName">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Индекс:</label>
                            <input type="text" name="index" class="form-control" id="formIndex">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Область:</label>
                            <input type="text" name="regionName" class="form-control" id="formRegion">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Район:</label>
                            <input type="text" name="districtName" class="form-control" id="formDistrict">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Город:</label>
                            <input type="text" name="cityName" class="form-control" id="formCity">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Район города:</label>
                            <input type="text" name="cityZone" class="form-control" id="formCityZone">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Улица:</label>
                            <input type="text" name="streetName" class="form-control" id="formStreet">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Дом/строение:</label>
                            <input type="text" name="buildingNumber" class="form-control" id="formBuilding">
                        </div>
						<div class="form-group">
                            <label for="formTitle">Квартира:</label>
                            <input type="text" name="flatNumber" class="form-control" id="formFlat">
                        </div>
	
                    </form>
                </div>
                <div class="col-3">
                    <div>
                        <button type="submit" class="btn btn-primary" onclick="unp.add()">
                            Сохранить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->theme->footer(); ?>