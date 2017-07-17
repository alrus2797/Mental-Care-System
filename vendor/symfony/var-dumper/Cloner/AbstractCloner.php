<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Cloner;

use Symfony\Component\VarDumper\Caster\Caster;
use Symfony\Component\VarDumper\Exception\ThrowingCasterException;

/**
 * AbstractCloner implements a generic caster mechanism for objects and resources.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
abstract class AbstractCloner implements ClonerInterface
{
    public static $defaultCasters = array(
<<<<<<< HEAD
        '__PHP_Incomplete_Class' => array('Symfony\Component\VarDumper\Caster\Caster', 'castPhpIncompleteClass'),

        'Symfony\Component\VarDumper\Caster\CutStub' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'castStub'),
        'Symfony\Component\VarDumper\Caster\CutArrayStub' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'castCutArray'),
        'Symfony\Component\VarDumper\Caster\ConstStub' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'castStub'),
        'Symfony\Component\VarDumper\Caster\EnumStub' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'castEnum'),

        'Closure' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castClosure'),
        'Generator' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castGenerator'),
        'ReflectionType' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castType'),
        'ReflectionGenerator' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castReflectionGenerator'),
        'ReflectionClass' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castClass'),
        'ReflectionFunctionAbstract' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castFunctionAbstract'),
        'ReflectionMethod' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castMethod'),
        'ReflectionParameter' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castParameter'),
        'ReflectionProperty' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castProperty'),
        'ReflectionExtension' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castExtension'),
        'ReflectionZendExtension' => array('Symfony\Component\VarDumper\Caster\ReflectionCaster', 'castZendExtension'),

        'Doctrine\Common\Persistence\ObjectManager' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'cutInternals'),
        'Doctrine\Common\Proxy\Proxy' => array('Symfony\Component\VarDumper\Caster\DoctrineCaster', 'castCommonProxy'),
        'Doctrine\ORM\Proxy\Proxy' => array('Symfony\Component\VarDumper\Caster\DoctrineCaster', 'castOrmProxy'),
        'Doctrine\ORM\PersistentCollection' => array('Symfony\Component\VarDumper\Caster\DoctrineCaster', 'castPersistentCollection'),

        'DOMException' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castException'),
        'DOMStringList' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLength'),
        'DOMNameList' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLength'),
        'DOMImplementation' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castImplementation'),
        'DOMImplementationList' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLength'),
        'DOMNode' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castNode'),
        'DOMNameSpaceNode' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castNameSpaceNode'),
        'DOMDocument' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castDocument'),
        'DOMNodeList' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLength'),
        'DOMNamedNodeMap' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLength'),
        'DOMCharacterData' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castCharacterData'),
        'DOMAttr' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castAttr'),
        'DOMElement' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castElement'),
        'DOMText' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castText'),
        'DOMTypeinfo' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castTypeinfo'),
        'DOMDomError' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castDomError'),
        'DOMLocator' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castLocator'),
        'DOMDocumentType' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castDocumentType'),
        'DOMNotation' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castNotation'),
        'DOMEntity' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castEntity'),
        'DOMProcessingInstruction' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castProcessingInstruction'),
        'DOMXPath' => array('Symfony\Component\VarDumper\Caster\DOMCaster', 'castXPath'),

        'XmlReader' => array('Symfony\Component\VarDumper\Caster\XmlReaderCaster', 'castXmlReader'),

        'ErrorException' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castErrorException'),
        'Exception' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castException'),
        'Error' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castError'),
        'Symfony\Component\DependencyInjection\ContainerInterface' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'cutInternals'),
        'Symfony\Component\HttpFoundation\Request' => array('Symfony\Component\VarDumper\Caster\SymfonyCaster', 'castRequest'),
        'Symfony\Component\VarDumper\Exception\ThrowingCasterException' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castThrowingCasterException'),
        'Symfony\Component\VarDumper\Caster\TraceStub' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castTraceStub'),
        'Symfony\Component\VarDumper\Caster\FrameStub' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castFrameStub'),
        'Symfony\Component\Debug\Exception\SilencedErrorContext' => array('Symfony\Component\VarDumper\Caster\ExceptionCaster', 'castSilencedErrorContext'),

        'PHPUnit_Framework_MockObject_MockObject' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'cutInternals'),
        'Prophecy\Prophecy\ProphecySubjectInterface' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'cutInternals'),
        'Mockery\MockInterface' => array('Symfony\Component\VarDumper\Caster\StubCaster', 'cutInternals'),

        'PDO' => array('Symfony\Component\VarDumper\Caster\PdoCaster', 'castPdo'),
        'PDOStatement' => array('Symfony\Component\VarDumper\Caster\PdoCaster', 'castPdoStatement'),

        'AMQPConnection' => array('Symfony\Component\VarDumper\Caster\AmqpCaster', 'castConnection'),
        'AMQPChannel' => array('Symfony\Component\VarDumper\Caster\AmqpCaster', 'castChannel'),
        'AMQPQueue' => array('Symfony\Component\VarDumper\Caster\AmqpCaster', 'castQueue'),
        'AMQPExchange' => array('Symfony\Component\VarDumper\Caster\AmqpCaster', 'castExchange'),
        'AMQPEnvelope' => array('Symfony\Component\VarDumper\Caster\AmqpCaster', 'castEnvelope'),

        'ArrayObject' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castArrayObject'),
        'SplDoublyLinkedList' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castDoublyLinkedList'),
        'SplFileInfo' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castFileInfo'),
        'SplFileObject' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castFileObject'),
        'SplFixedArray' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castFixedArray'),
        'SplHeap' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castHeap'),
        'SplObjectStorage' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castObjectStorage'),
        'SplPriorityQueue' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castHeap'),
        'OuterIterator' => array('Symfony\Component\VarDumper\Caster\SplCaster', 'castOuterIterator'),

        'MongoCursorInterface' => array('Symfony\Component\VarDumper\Caster\MongoCaster', 'castCursor'),

        'Redis' => array('Symfony\Component\VarDumper\Caster\RedisCaster', 'castRedis'),
        'RedisArray' => array('Symfony\Component\VarDumper\Caster\RedisCaster', 'castRedisArray'),

        ':curl' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castCurl'),
        ':dba' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castDba'),
        ':dba persistent' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castDba'),
        ':gd' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castGd'),
        ':mysql link' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castMysqlLink'),
        ':pgsql large object' => array('Symfony\Component\VarDumper\Caster\PgSqlCaster', 'castLargeObject'),
        ':pgsql link' => array('Symfony\Component\VarDumper\Caster\PgSqlCaster', 'castLink'),
        ':pgsql link persistent' => array('Symfony\Component\VarDumper\Caster\PgSqlCaster', 'castLink'),
        ':pgsql result' => array('Symfony\Component\VarDumper\Caster\PgSqlCaster', 'castResult'),
        ':process' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castProcess'),
        ':stream' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castStream'),
        ':persistent stream' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castStream'),
        ':stream-context' => array('Symfony\Component\VarDumper\Caster\ResourceCaster', 'castStreamContext'),
        ':xml' => array('Symfony\Component\VarDumper\Caster\XmlResourceCaster', 'castXml'),
=======
        '__PHP_Incomplete_Class' => 'Symfony\Component\VarDumper\Caster\Caster::castPhpIncompleteClass',

        'Symfony\Component\VarDumper\Caster\CutStub' => 'Symfony\Component\VarDumper\Caster\StubCaster::castStub',
        'Symfony\Component\VarDumper\Caster\CutArrayStub' => 'Symfony\Component\VarDumper\Caster\StubCaster::castCutArray',
        'Symfony\Component\VarDumper\Caster\ConstStub' => 'Symfony\Component\VarDumper\Caster\StubCaster::castStub',
        'Symfony\Component\VarDumper\Caster\EnumStub' => 'Symfony\Component\VarDumper\Caster\StubCaster::castEnum',

        'Closure' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castClosure',
        'Generator' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castGenerator',
        'ReflectionType' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castType',
        'ReflectionGenerator' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castReflectionGenerator',
        'ReflectionClass' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castClass',
        'ReflectionFunctionAbstract' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castFunctionAbstract',
        'ReflectionMethod' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castMethod',
        'ReflectionParameter' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castParameter',
        'ReflectionProperty' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castProperty',
        'ReflectionExtension' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castExtension',
        'ReflectionZendExtension' => 'Symfony\Component\VarDumper\Caster\ReflectionCaster::castZendExtension',

        'Doctrine\Common\Persistence\ObjectManager' => 'Symfony\Component\VarDumper\Caster\StubCaster::cutInternals',
        'Doctrine\Common\Proxy\Proxy' => 'Symfony\Component\VarDumper\Caster\DoctrineCaster::castCommonProxy',
        'Doctrine\ORM\Proxy\Proxy' => 'Symfony\Component\VarDumper\Caster\DoctrineCaster::castOrmProxy',
        'Doctrine\ORM\PersistentCollection' => 'Symfony\Component\VarDumper\Caster\DoctrineCaster::castPersistentCollection',

        'DOMException' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castException',
        'DOMStringList' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLength',
        'DOMNameList' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLength',
        'DOMImplementation' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castImplementation',
        'DOMImplementationList' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLength',
        'DOMNode' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castNode',
        'DOMNameSpaceNode' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castNameSpaceNode',
        'DOMDocument' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castDocument',
        'DOMNodeList' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLength',
        'DOMNamedNodeMap' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLength',
        'DOMCharacterData' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castCharacterData',
        'DOMAttr' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castAttr',
        'DOMElement' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castElement',
        'DOMText' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castText',
        'DOMTypeinfo' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castTypeinfo',
        'DOMDomError' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castDomError',
        'DOMLocator' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castLocator',
        'DOMDocumentType' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castDocumentType',
        'DOMNotation' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castNotation',
        'DOMEntity' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castEntity',
        'DOMProcessingInstruction' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castProcessingInstruction',
        'DOMXPath' => 'Symfony\Component\VarDumper\Caster\DOMCaster::castXPath',

        'XmlReader' => 'Symfony\Component\VarDumper\Caster\XmlReaderCaster::castXmlReader',

        'ErrorException' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castErrorException',
        'Exception' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castException',
        'Error' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castError',
        'Symfony\Component\DependencyInjection\ContainerInterface' => 'Symfony\Component\VarDumper\Caster\StubCaster::cutInternals',
        'Symfony\Component\VarDumper\Exception\ThrowingCasterException' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castThrowingCasterException',
        'Symfony\Component\VarDumper\Caster\TraceStub' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castTraceStub',
        'Symfony\Component\VarDumper\Caster\FrameStub' => 'Symfony\Component\VarDumper\Caster\ExceptionCaster::castFrameStub',

        'PHPUnit_Framework_MockObject_MockObject' => 'Symfony\Component\VarDumper\Caster\StubCaster::cutInternals',
        'Prophecy\Prophecy\ProphecySubjectInterface' => 'Symfony\Component\VarDumper\Caster\StubCaster::cutInternals',
        'Mockery\MockInterface' => 'Symfony\Component\VarDumper\Caster\StubCaster::cutInternals',

        'PDO' => 'Symfony\Component\VarDumper\Caster\PdoCaster::castPdo',
        'PDOStatement' => 'Symfony\Component\VarDumper\Caster\PdoCaster::castPdoStatement',

        'AMQPConnection' => 'Symfony\Component\VarDumper\Caster\AmqpCaster::castConnection',
        'AMQPChannel' => 'Symfony\Component\VarDumper\Caster\AmqpCaster::castChannel',
        'AMQPQueue' => 'Symfony\Component\VarDumper\Caster\AmqpCaster::castQueue',
        'AMQPExchange' => 'Symfony\Component\VarDumper\Caster\AmqpCaster::castExchange',
        'AMQPEnvelope' => 'Symfony\Component\VarDumper\Caster\AmqpCaster::castEnvelope',

        'ArrayObject' => 'Symfony\Component\VarDumper\Caster\SplCaster::castArrayObject',
        'SplDoublyLinkedList' => 'Symfony\Component\VarDumper\Caster\SplCaster::castDoublyLinkedList',
        'SplFileInfo' => 'Symfony\Component\VarDumper\Caster\SplCaster::castFileInfo',
        'SplFileObject' => 'Symfony\Component\VarDumper\Caster\SplCaster::castFileObject',
        'SplFixedArray' => 'Symfony\Component\VarDumper\Caster\SplCaster::castFixedArray',
        'SplHeap' => 'Symfony\Component\VarDumper\Caster\SplCaster::castHeap',
        'SplObjectStorage' => 'Symfony\Component\VarDumper\Caster\SplCaster::castObjectStorage',
        'SplPriorityQueue' => 'Symfony\Component\VarDumper\Caster\SplCaster::castHeap',
        'OuterIterator' => 'Symfony\Component\VarDumper\Caster\SplCaster::castOuterIterator',

        'MongoCursorInterface' => 'Symfony\Component\VarDumper\Caster\MongoCaster::castCursor',

        'Redis' => 'Symfony\Component\VarDumper\Caster\RedisCaster::castRedis',
        'RedisArray' => 'Symfony\Component\VarDumper\Caster\RedisCaster::castRedisArray',

        ':curl' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castCurl',
        ':dba' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castDba',
        ':dba persistent' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castDba',
        ':gd' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castGd',
        ':mysql link' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castMysqlLink',
        ':pgsql large object' => 'Symfony\Component\VarDumper\Caster\PgSqlCaster::castLargeObject',
        ':pgsql link' => 'Symfony\Component\VarDumper\Caster\PgSqlCaster::castLink',
        ':pgsql link persistent' => 'Symfony\Component\VarDumper\Caster\PgSqlCaster::castLink',
        ':pgsql result' => 'Symfony\Component\VarDumper\Caster\PgSqlCaster::castResult',
        ':process' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castProcess',
        ':stream' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castStream',
        ':stream-context' => 'Symfony\Component\VarDumper\Caster\ResourceCaster::castStreamContext',
        ':xml' => 'Symfony\Component\VarDumper\Caster\XmlResourceCaster::castXml',
>>>>>>> PatientRecord
    );

    protected $maxItems = 2500;
    protected $maxString = -1;
    protected $useExt;

    private $casters = array();
    private $prevErrorHandler;
    private $classInfo = array();
    private $filter = 0;

    /**
     * @param callable[]|null $casters A map of casters
     *
     * @see addCasters
     */
    public function __construct(array $casters = null)
    {
        if (null === $casters) {
            $casters = static::$defaultCasters;
        }
        $this->addCasters($casters);
        $this->useExt = extension_loaded('symfony_debug');
    }

    /**
     * Adds casters for resources and objects.
     *
     * Maps resources or objects types to a callback.
     * Types are in the key, with a callable caster for value.
     * Resource types are to be prefixed with a `:`,
     * see e.g. static::$defaultCasters.
     *
     * @param callable[] $casters A map of casters
     */
    public function addCasters(array $casters)
    {
        foreach ($casters as $type => $callback) {
            $this->casters[strtolower($type)][] = is_string($callback) && false !== strpos($callback, '::') ? explode('::', $callback, 2) : $callback;
        }
    }

    /**
     * Sets the maximum number of items to clone past the first level in nested structures.
     *
     * @param int $maxItems
     */
    public function setMaxItems($maxItems)
    {
        $this->maxItems = (int) $maxItems;
    }

    /**
     * Sets the maximum cloned length for strings.
     *
     * @param int $maxString
     */
    public function setMaxString($maxString)
    {
        $this->maxString = (int) $maxString;
    }

    /**
     * Clones a PHP variable.
     *
     * @param mixed $var    Any PHP variable
     * @param int   $filter A bit field of Caster::EXCLUDE_* constants
     *
     * @return Data The cloned variable represented by a Data object
     */
    public function cloneVar($var, $filter = 0)
    {
        $this->prevErrorHandler = set_error_handler(function ($type, $msg, $file, $line, $context) {
            if (E_RECOVERABLE_ERROR === $type || E_USER_ERROR === $type) {
                // Cloner never dies
                throw new \ErrorException($msg, 0, $type, $file, $line);
            }

            if ($this->prevErrorHandler) {
                return call_user_func($this->prevErrorHandler, $type, $msg, $file, $line, $context);
            }

            return false;
        });
        $this->filter = $filter;

        try {
            $data = $this->doClone($var);
        } catch (\Exception $e) {
        }
        restore_error_handler();
        $this->prevErrorHandler = null;

        if (isset($e)) {
            throw $e;
        }

        return new Data($data);
    }

    /**
     * Effectively clones the PHP variable.
     *
     * @param mixed $var Any PHP variable
     *
     * @return array The cloned variable represented in an array
     */
    abstract protected function doClone($var);

    /**
     * Casts an object to an array representation.
     *
     * @param Stub $stub     The Stub for the casted object
     * @param bool $isNested True if the object is nested in the dumped structure
     *
     * @return array The object casted as array
     */
    protected function castObject(Stub $stub, $isNested)
    {
        $obj = $stub->value;
        $class = $stub->class;

        if (isset($class[15]) && "\0" === $class[15] && 0 === strpos($class, "class@anonymous\x00")) {
            $stub->class = get_parent_class($class).'@anonymous';
        }
        if (isset($this->classInfo[$class])) {
            list($i, $parents, $hasDebugInfo) = $this->classInfo[$class];
        } else {
            $i = 2;
            $parents = array(strtolower($class));
            $hasDebugInfo = method_exists($class, '__debugInfo');

            foreach (class_parents($class) as $p) {
                $parents[] = strtolower($p);
                ++$i;
            }
            foreach (class_implements($class) as $p) {
                $parents[] = strtolower($p);
                ++$i;
            }
            $parents[] = '*';

            $this->classInfo[$class] = array($i, $parents, $hasDebugInfo);
        }

        $a = Caster::castObject($obj, $class, $hasDebugInfo);

        try {
            while ($i--) {
                if (!empty($this->casters[$p = $parents[$i]])) {
                    foreach ($this->casters[$p] as $callback) {
                        $a = $callback($obj, $a, $stub, $isNested, $this->filter);
                    }
                }
            }
        } catch (\Exception $e) {
            $a = array((Stub::TYPE_OBJECT === $stub->type ? Caster::PREFIX_VIRTUAL : '').'⚠' => new ThrowingCasterException($e)) + $a;
        }

        return $a;
    }

    /**
     * Casts a resource to an array representation.
     *
     * @param Stub $stub     The Stub for the casted resource
     * @param bool $isNested True if the object is nested in the dumped structure
     *
     * @return array The resource casted as array
     */
    protected function castResource(Stub $stub, $isNested)
    {
        $a = array();
        $res = $stub->value;
        $type = $stub->class;

        try {
            if (!empty($this->casters[':'.$type])) {
                foreach ($this->casters[':'.$type] as $callback) {
                    $a = $callback($res, $a, $stub, $isNested, $this->filter);
                }
            }
        } catch (\Exception $e) {
            $a = array((Stub::TYPE_OBJECT === $stub->type ? Caster::PREFIX_VIRTUAL : '').'⚠' => new ThrowingCasterException($e)) + $a;
        }

        return $a;
    }
}
