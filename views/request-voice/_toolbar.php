<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ZhiCaiWX\models\forsearch\WxRequestVoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel panel-default wx-request-voice-toolbar">批量操作：
    <?php
    $jsfuncton = false;
    $model = new ZhiCaiWX\models\WxRequestVoice();
    $options = $model->options;
    foreach ($model->toolbars as $toolbar) {
        if ($toolbar['jsfunction'] != 'changeStatus') {
            $jsfuncton = true;
        }
        echo Html::button($toolbar['name'], ['class' => 'btn btn-primary btn-sm', 'onclick' => "javascript:{$toolbar['jsfunction']}('{$toolbar['field']}','{$toolbar['field_value']}')"]);
    }
    ?>
</div>
<script type="text/javascript">
    <?php $this->beginBlock('toolbar') ?>
    var data = new Object();  //对象
    function changeStatus(f, v, k) {
        data.f = f;
        data.v = v;
        if (k == null) {
            data.keys = $('#grid').yiiGridView('getSelectedRows');
        } else {
            data.keys = {k};
        }
        console.log(data.keys);
        if (data.keys.length == 0) {
            alert("至少选择一项");
            return;
        }
        var url = '<?= Yii::$app->urlManager->createUrl('request-voice/change-status-ajax') ?>';
        $.ajax({
            url: url,
            type: 'get',//必须使用,不知道为什么
            dataType: 'json',
            data: data,
            success: function (data) {
                alert(data.msg);
                console.log(data);
                location.reload();
            }
        })
    }

    <?php $this->endBlock() ?>
</script>
<?php $this->registerJs($this->blocks['toolbar'], \yii\web\View::POS_END) ?>
