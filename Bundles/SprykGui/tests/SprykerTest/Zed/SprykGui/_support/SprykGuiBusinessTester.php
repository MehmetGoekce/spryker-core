<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\SprykGui;

use Codeception\Actor;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 * @method \Spryker\Zed\SprykGui\Business\SprykGuiFacadeInterface getFacade()
 */
class SprykGuiBusinessTester extends Actor
{
    use _generated\SprykGuiBusinessTesterActions;

    /**
     * @param array $sprykView
     *
     * @return void
     */
    public function assertCommandLine(array $sprykView)
    {
        $this->assertArrayHasKey('commandLine', $sprykView);

        $expectedCommandLine = 'vendor/bin/console spryk:run AddZedBusinessFacadeMethod  --module=\'FooBar\' --comment=\'Specification:\' --comment=\'- Line one.\' --comment=\'- Line two.\' --method=\'addFooBar\' --input=\'string $fooBar\' --output=\'bool\' -n';
        $this->assertSame($expectedCommandLine, $sprykView['commandLine']);
    }

    /**
     * @param array $sprykView
     *
     * @return void
     */
    public function assertJiraTemplate(array $sprykView)
    {
        $this->assertArrayHasKey('jiraTemplate', $sprykView);

        $expectedJiraTemplate = '
{code:title=AddZedBusinessFacadeMethod|theme=Midnight|linenumbers=true|collapse=true}
vendor/bin/console spryk:run AddZedBusinessFacadeMethod  --module=\'FooBar\' --comment=\'Specification:\' --comment=\'- Line one.\' --comment=\'- Line two.\' --method=\'addFooBar\' --input=\'string $fooBar\' --output=\'bool\' -n

"module"
// FooBar

"comment"
// Specification:
// - Line one.
// - Line two.

"method"
// addFooBar

"input"
// string $fooBar

"output"
// bool

{code}';
        $this->assertSame($expectedJiraTemplate, $sprykView['jiraTemplate']);
    }
}
