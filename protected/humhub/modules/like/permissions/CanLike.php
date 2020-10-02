<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2020 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\like\permissions;

use humhub\modules\space\models\Space;
use humhub\modules\user\models\User;

/**
 * CanLike Permission
 */
class CanLike extends \humhub\libs\BasePermission
{

    /**
     * @inheritdoc
     */
    public $defaultAllowedGroups = [
        Space::USERGROUP_OWNER,
        Space::USERGROUP_ADMIN,
        Space::USERGROUP_MODERATOR,
        Space::USERGROUP_MEMBER,
        Space::USERGROUP_USER,
        User::USERGROUP_SELF,
        User::USERGROUP_FRIEND,
        User::USERGROUP_USER,
    ];

    /**
     * @inheritdoc
     */
    protected $fixedGroups = [
        Space::USERGROUP_GUEST,
    ];

    /**
     * @inheritdoc
     */
    protected $title = 'Add Like';

    /**
     * @inheritdoc
     */
    protected $description = 'Allows the user to add likes';

    /**
     * @inheritdoc
     */
    protected $moduleId = 'like';

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->title = \Yii::t('LikeModule.permissions', 'Add Like');
        $this->description = \Yii::t('LikeModule.permissions', 'Allows the user to add likes');
    }

}
