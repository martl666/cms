<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 25.09.2018
 * Time: 13:21
 */

namespace Util;


class PHPDebugBarEloquentCollector extends \DebugBar\DataCollector\PDO\PDOCollector
{

    private $_db;
    public function __construct( $db )
    {
        $this->_db = $db;

        parent::__construct();
        $this->addConnection($this->getTraceablePdo(), 'Eloquent PDO');
    }

    /**
     * @return Illuminate\Database\Capsule\Manager;
     */
    protected function getEloquentCapsule() {
        // ... Return your Illuminate\Database\Capsule\Manager instance here...

        return $this->_db;
    }

    /**
     * @return PDO
     */
    protected function getEloquentPdo() {
        return $this->getEloquentCapsule()->getConnection()->getPdo();
    }

    /**
     * @return \DebugBar\DataCollector\PDO\TraceablePDO
     */
    protected function getTraceablePdo() {
        return new \DebugBar\DataCollector\PDO\TraceablePDO($this->getEloquentPdo());
    }

    // Override
    public function getName() {
        return "eloquent_pdo";
    }

    // Override
    public function getWidgets()
    {
        return array(
            "eloquent" => array(
                "icon"    => "inbox",
                "widget"  => "PhpDebugBar.Widgets.SQLQueriesWidget",
                "map"     => "eloquent_pdo",
                "default" => "[]"
            ),
            "eloquent:badge" => array(
                "map"     => "eloquent_pdo.nb_statements",
                "default" => 0
            )
        );
    }
}