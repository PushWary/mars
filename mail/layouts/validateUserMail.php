<?php 
use yii\helpers\Html;

$link = Yii::$app->urlManager->createAbsoluteUrl([],'token'=>$token);
?>

<a href="<?php echo $link ?>" ><?php echo $link; ?></a> 
