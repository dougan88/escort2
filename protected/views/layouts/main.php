<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $user = Yii::app()->user; ?>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Girls', 'url'=>array('/girls/list'),),
				array('label' => 'Create girl', 'url' => array('/girls/create'), 'visible' => ($user->checkAccess('customer') || $user->checkAccess('manager'))),
				array('label' => 'Edit girls', 'url' => array('/girls/edit-list'), 'visible' => ($user->checkAccess('customer') || $user->checkAccess('manager'))),
				array('label'=>'Agency', 'url'=>array('/agency/list'),),
				array('label' => 'Create agency', 'url' => array('/agency/create'), 'visible' => ($user->checkAccess('customer') || $user->checkAccess('manager'))),
				array('label' => 'Edit agency', 'url' => array('/agency/edit-list'), 'visible' => ($user->checkAccess('customer') || $user->checkAccess('manager'))),
				array('label' => 'Create user', 'url' => array('/user/create'), 'visible' => $user->checkAccess('manager')),
				array('label' => 'Users list', 'url' => array('/user/list'), 'visible' => $user->checkAccess('manager')),
				array('label' => 'Edit users', 'url' => array('/user/edit-list'), 'visible' => $user->checkAccess('manager')),
				array('label' => 'Login', 'url'=>array('/site/login'), 'visible' => $user->isGuest),
				array('label' => 'Register', 'url'=>array('/site/register'), 'visible' => $user->isGuest),
				array('label' => 'Logout ('.$user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; Our company bla-bla-bla<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
