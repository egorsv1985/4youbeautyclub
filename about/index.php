<?
//define('TYPE_PAGE', 'CONTANER');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "О нас");
$APPLICATION->SetTitle("О нас");
?>
<section class="py-5 about">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 fs-24">
				<div class="mb-5 head-title text-uppercase">
					<h1>О нас</h1>
				</div>
				<p>Мы используем передовые технологии и профессиональное оборудование для максимально эффективных и безопасных процедур.</p>
				<p>Мы гарантируем вам не только ухоженность, но и радость от каждой посещённой нами процедуры. Доверьтесь профессионалам и откройте для себя новое измерение косметологии!</p>
				<div class="mt-5 btns">
					<a href="#" class="px-4 py-3 btn btn-outline-dark top-btn btn-arrow fs-24">Оставить заявку</a>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="row position-relative">
					<div class="col-7">						
						<div class="box-img">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/about.png" alt="" class="">
						</div>
					</div>
					<div class="col-5">						
						<div class="box-img">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/about1.png" alt="" class="">
						</div>
					</div>
					<div class="col-5">
						<div class="box-img">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/about2.png" alt="" class="">
						</div>						
					</div>
					<div class="col-7">						
						<div class="box-img">
							<img src="<?= SITE_TEMPLATE_PATH; ?>/images/about3.png" alt="" class="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>