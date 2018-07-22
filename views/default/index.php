<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::t('modules/notifications', 'Notifications');

?>

<div class="page-header">
    <div class="buttons">
        <a class="btn btn-danger"
           href="<?= Url::toRoute(['/notifications/default/delete-all']) ?>"><?= Yii::t('modules/notifications',
                'Delete all'); ?></a>
        <a class="btn btn-secondary"
           href="<?= Url::toRoute(['/notifications/default/read-all']) ?>"><?= Yii::t('modules/notifications',
                'Mark all as read'); ?></a>
    </div>
    <h1>
        <span class="icon icon-bell"></span>
        <?= Yii::t('modules/notifications', 'Notifications') ?>
    </h1>
</div>

<div class="page-content">
    <ul id="notifications-items">
        <?php if (isset($notifications)): ?>
            <?php foreach ($notifications as $notify): ?>
                <li class="notification-item<?php if ($notify['read']): ?> read<?php endif; ?>"
                    data-id="<?= $notify['id']; ?>" data-key="<?= $notify['key']; ?>">
                    <a href="<?= $notify['url'] ?>">
                        <span class="icon"></span>
                        <span class="message"><?= Html::encode($notify['message']); ?></span>
                    </a>
                    <small class="timeago"><?= $notify['timeago']; ?></small>

                    <span class="mark-read" title=" <?php
                    if ((bool)$notify['read']) {
                        echo Yii::t('modules/notifications', 'Read');
                    } else {
                        echo Yii::t('modules/notifications', 'Mark as read');
                    } ?>"></span>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="empty-row"><?= Yii::t('modules/notifications', 'There are no notifications to show') ?></li>
        <?php endif; ?>
    </ul>

    <?= LinkPager::widget(['pagination' => $pagination]); ?>
</div>
