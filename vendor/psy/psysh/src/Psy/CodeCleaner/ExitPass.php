<?php

/*
 * This file is part of Psy Shell.
 *
 * (c) 2012-2015 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\CodeCleaner;

use PhpParser\Node;
use PhpParser\Node\Expr\Exit_;
<<<<<<< HEAD
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Name\FullyQualified as FullyQualifiedName;
=======
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Throw_;
>>>>>>> PatientRecord

class ExitPass extends CodeCleanerPass
{
    /**
     * Converts exit calls to BreakExceptions.
     *
     * @param \PhpParser\Node $node
     */
    public function leaveNode(Node $node)
    {
        if ($node instanceof Exit_) {
<<<<<<< HEAD
            return new StaticCall(new FullyQualifiedName('Psy\Exception\BreakException'), 'exitShell');
=======
            $args = array(new Arg(new String_('Goodbye.')));

            return new Throw_(new New_(new Name('Psy\Exception\BreakException'), $args));
>>>>>>> PatientRecord
        }
    }
}
