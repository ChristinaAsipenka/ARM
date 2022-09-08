</div>
<footer>
<p>Программный комплекс "АРМ Инспектора". По всем вопросам и предложениям обращаться в сектор РИТ.</p>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<?php

$url_short = $_SERVER['REQUEST_URI'];






 
	if(strstr($url_short,'unp')){
	
		
	
	}
 
 
 
 ?>

<script src="/ARM/basis/Assets/js/jquery-2.0.3.min.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/jquery-sortable.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/jquery.cookie.min.js?v=<?= time(); ?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/bootstrap.min.js"></script>
<script src="/ARM/basis/Assets/js/main.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/bignumber.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/plugins/redactor/redactor.min.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/init.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/filterMain.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/menu.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/modalWindow.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/address.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/search.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/typeproperty.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/modalWindowGuides.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/report.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/info.js?v=<?= time(); ?>"></script>
<script src="/ARM/basis/Assets/js/guides.js?v=<?= time(); ?>"></script>	


<?php

$url_short = $_SERVER['REQUEST_URI'];


	if(strstr($url_short,'/unp/')){
	
		echo "<script src='/ARM/basis/Assets/js/unp.js?v=".time()."'></script>";
	
	}elseif(strstr($url_short,'/subject/') || strstr($url_short,'/filter/')){

		echo "<script src='/ARM/basis/Assets/js/subject.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/filter_subject.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/personal.js?v=".time()."'></script>";
		
	}elseif(strstr($url_short,'/objects/')){
		
		echo "<script src='/ARM/basis/Assets/js/object.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/filter_object.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/calc_units.js?v=".time()."'></script>";	
		echo "<script src='/ARM/basis/Assets/js/myTab.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/personal.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/subject.js?v=".time()."'></script>";		
		
	}elseif(strstr($url_short,'/individual_persons/')){
		
		echo "<script src='/ARM/basis/Assets/js/ind_pers.js?v=".time()."'></script>";		
		
	}elseif(strstr($url_short,'/personal/')){

		echo "<script src='/ARM/basis/Assets/js/personal.js?v=".time()."'></script>";
		echo "<script src='/ARM/examination/Assets/js/resp_pers.js?v=".time()."'></script>";
		echo "<script src='/ARM/examination/Assets/js/filterMain.js?v=".time()."'></script>";
		echo "<script src='/ARM/basis/Assets/js/pagination.js?v=".time()."'></script>";
		echo "<script src='/ARM/examination/Assets/js/report_zurnal.js?v=".time()."'></script>";
		echo "<script src='/ARM/examination/Assets/js/test.js?v=".time()."'></script>";

		
	}elseif(strstr($url_short,'/guides/')){
		
		echo "<script src='/ARM/basis/Assets/js/guides.js?v=".time()."'></script>";		
		
	}
	
 ?>






</body>
</html>
<script>
  preloader();
</script>