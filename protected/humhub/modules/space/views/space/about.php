<?php

use humhub\modules\space\models\Space;
use humhub\modules\space\widgets\Members;
use humhub\modules\space\widgets\MyMembership;
use humhub\modules\space\widgets\CustomSidebar;
use humhub\modules\content\widgets\richtext\RichText;
use humhub\modules\user\widgets\Image;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('SpaceModule.base', '<strong>About Space</strong>') ?>
    </div>
    <div class="panel-body">
        <div>
            <?= Yii::t('SpaceModule.base', '<strong>Description</strong>') ?>
            <div data-ui-markdown data-ui-show-more
                 data-read-more-text="<?= Yii::t('SpaceModule.base', 'Read More') ?>">
                <?= RichText::output($space->long_description) ?>
            </div>
        </div>
        <br>
        <div>
            <?= Yii::t('SpaceModule.base', '<strong>Contact Persons</strong>') ?>
            <?php if (!empty($userGroups[Space::USERGROUP_OWNER])): ?>
                <div class="media">
                    <div class="media-heading"><?= Yii::t('SpaceModule.base', 'Owner'); ?>
                        (<?= count($userGroups[Space::USERGROUP_OWNER]) ?>)
                    </div>
                    <div class="media-body">
                        <?php foreach ($userGroups[Space::USERGROUP_OWNER] as $user) {
                            echo Image::widget([
                                'user' => $user, 'width' => 32,
                                'htmlOptions' => ['style' => 'padding: 3px'],
                                'imageOptions' => ['style' => 'border:1px solid ' . $this->theme->variable('success')]
                            ]);
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($userGroups[Space::USERGROUP_ADMIN])): ?>
                <div class="media">
                    <div class="media-heading"><?= Yii::t('SpaceModule.base', 'Admins'); ?>
                        (<?= count($userGroups[Space::USERGROUP_ADMIN]) ?>)
                    </div>
                    <div class="media-body">
                        <?php foreach ($userGroups[Space::USERGROUP_ADMIN] as $user) {
                            echo Image::widget([
                                'user' => $user, 'width' => 32,
                                'htmlOptions' => ['style' => 'padding: 3px'],
                                'imageOptions' => ['style' => 'border:1px solid ' . $this->theme->variable('success')]
                            ]);
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($userGroups[Space::USERGROUP_MODERATOR])): ?>
                <div class="media">
                    <div class="media-heading"><?= Yii::t('SpaceModule.base', 'Moderators'); ?>
                        (<?= count($userGroups[Space::USERGROUP_MODERATOR]) ?>)
                    </div>
                    <div class="media-body">
                        <?php foreach ($userGroups[Space::USERGROUP_MODERATOR] as $user) {
                            echo Image::widget([
                                'user' => $user, 'width' => 32,
                                'htmlOptions' => ['style' => 'padding: 3px'],
                                'imageOptions' => ['style' => 'border:1px solid ' . $this->theme->variable('success')]
                            ]);
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <div>
            <?= Yii::t('SpaceModule.base', '<strong>Security Settings</strong>'); ?>
            <div>
                <h5>Join Policy</h5>
                <i class="fa fa-users"></i>
                <?= Space::joinPolicyOptions()[$space->join_policy] ?>

                <h5>Space Visibility</h5>
                <i class="fa fa-globe"></i>
                <?= Space::visibilityOptions()[$space->visibility] ?>
            </div>
        </div>
    </div>
</div>

<?php
$this->beginBlock('sidebar'); ?>
<?= CustomSidebar::widget(['space' => $space, 'baseWidgets' => false, 'customWidget' => [
    [MyMembership::class, ['space' => $space], ['sortOrder' => 10]],
    [Members::class, ['space' => $space], ['sortOrder' => 20]]
]]);
?>
<?php $this->endBlock(); ?>
