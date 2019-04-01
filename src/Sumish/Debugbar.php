<?php

namespace Sumish;

class Debugbar extends \DebugBar\StandardDebugBar {
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;

        $this->addCollector(new \Sumish\Debugbar\InfoCollector());
        $this->addCollector(new \Sumish\Debugbar\SystemCollector());
        $this->addCollector(new \DebugBar\DataCollector\ConfigCollector());
        $this->init();

        parent::__construct($container);
    }

    public function init() {
        if ($this->container->debugbar) {
            $this->container->register('debugbar', $this->container->debugbar);
            $debugbar = $this->container->debugbar->getJavascriptRenderer();
            $this->container->view->addData([
                'debugbar_head' => $debugbar->renderHead(),
                'debugbar_body' => $debugbar->render()
            ]);
        }
    }

    public function log($data) {
        if (gettype($data) == 'array') {
            foreach ($data as $k=>$v) {
                $this['messages']->addMessage($data[$k]);
            }
        } else {
            $this['messages']->addMessage($data);
        }
    }

    public function time($data = null) {
        if (!is_null($data) && is_callable($data, false, $callable_name)) {
            $this['time']->measure('My long operation 2', $data);
        } else {
            echo __FUNCTION__;
        }
    }

    public function test() {
        return 0;
    }
}