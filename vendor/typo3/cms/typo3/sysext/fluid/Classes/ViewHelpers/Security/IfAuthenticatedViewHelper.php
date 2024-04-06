<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Fluid\ViewHelpers\Security;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * This ViewHelper implements an ifAuthenticated/else condition for frontend users.
 *
 * Examples
 * ========
 *
 * Basic usage
 * -----------
 *
 * ::
 *
 *    <f:security.ifAuthenticated>
 *       This is being shown whenever a FE user is logged in
 *    </f:security.ifAuthenticated>
 *
 * Everything inside the :html:`<f:security.ifAuthenticated>` tag is being displayed if
 * current frontend user is authenticated.
 *
 * IfAuthenticated / then / else
 * -----------------------------
 *
 * ::
 *
 *    <f:security.ifAuthenticated>
 *       <f:then>
 *          This is being shown in case you have access.
 *       </f:then>
 *       <f:else>
 *          This is being displayed in case you do not have access.
 *       </f:else>
 *    </f:security.ifAuthenticated>
 *
 * Everything inside the :html:`<f:then></f:then>` tag is displayed if frontend user is authenticated.
 * Otherwise, everything inside the :html:`<f:else></f:else>` tag is displayed.
 */
final class IfAuthenticatedViewHelper extends AbstractConditionViewHelper
{
    protected static function evaluateCondition($arguments = null): bool
    {
        return GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'id', 0) > 0;
    }
}
