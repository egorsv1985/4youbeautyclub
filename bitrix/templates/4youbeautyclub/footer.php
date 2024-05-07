<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
				<div class="bottom-form">

				</div>
<?if (TYPE_PAGE == 'MAIN'):?>
<?elseif (TYPE_PAGE == 'CONTANER'):?>
<?else:?>
			</div>
<?endif;?>

		</div>

		<footer class="py-5 fw-300">
			<div class="container pt-md-5">
				<div class="row text-center text-md-start">
					<div class="col-md-3">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="" class="h-auto mw-100" width="121" height="54">
						<div class="fs-18 my-4 py-2">
							© <?=date('Y');?> 4YOU Beauty club
						</div>
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/f-icon.svg" alt="" class="w-60 d-none d-md-inline">
					</div>
					<div class="col-md-2">
						<div class="f-title text-uppercase fw-500 fs-24 mb-3">Навигация</div>
						<ul class="f-menu fs-22 mb-4">
							<li>
								<a href="#">о нас</a>
							</li>
							<li>
								<a href="#">услуги</a>
							</li>
							<li>
								<a href="#">специалисты</a>
							</li>
							<li>
								<a href="#">до/после</a>
							</li>
							<li>
								<a href="#">контакты</a>
							</li>
							<li>
								<a href="#">блог</a>
							</li>
						</ul>
					</div>
					<div class="col-md-4">
						<div class="f-title text-uppercase fw-500 fs-24 mb-3"><a href="/uslugi/">Услуги</a></div>
						<ul class="f-menu fs-22 mb-4 text-lowercase">
							<?
							$arFilter = array('IBLOCK_ID' => 1, 'DEPTH_LEVEL' => 2);
							$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
							while ($arSection = $rsSections->GetNext()):?>
								<li>
									<a href="<?=$arSection['SECTION_PAGE_URL'];?>"><?=$arSection['NAME']?></a>
								</li>
							<?endwhile;?>
						</ul>

					</div>
					<div class="col-md-3 text-center text-md-start">
						<div class="f-title text-uppercase fw-500 fs-24 mb-3"><a href="/o_nas/">О клинике</a></div>
						<div class="fs-22 pb-2 mb-4">ООО «ФОЮ» Лицензия Л041-01126-23/00588911 от 10.06.2021 г. ИНН 2364019749</div>
						<div class="f-title text-uppercase fw-500 fs-24 mb-3">мы в соц.Сетях</div>
					</div>
				</div>
				<hr class="my-4">
				<div class="row fs-20">
					<div class="col-12 col-md text-center text-md-start"><a href="/politika/">Политика конфиденциальности</a></div>
					<div class="col-12 col-md text-center text-md-end"><a href="https://target-kc.ru" target="_blank">Разработка сайта: Таргет Консалт Компани</a></div>
				</div>
			</div>
		</footer>
	</body>
</html>