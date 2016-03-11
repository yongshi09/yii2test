<?php
use yii\helpers\Url;
?>
<p style="text-align:right;">
    <a href="<?=Url::to(['index'])?>" class="btn btn-primary">返回</a>
</p>

<table class="table table-hover">
    <tr>
        <th  style="text-align: center;"><?php echo $articleModel->title; ?></th>

    <tr>
        <th  style="text-align: center;">添加时间：<?=date("Y-m-d H:i:s" ,$articleModel->update_time)?>  阅读次数：<?php echo $articleModel->count; ?></th>
    </tr>
    <tr>
        <th><?php echo $articleModel->content; ?></th>
    </tr>

</table>

</div>