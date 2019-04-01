<?php

namespace Sumish\DebugBar;

use \DebugBar\DataCollector\DataCollector as DataCollector;
use \DebugBar\DataCollector\Renderable as Renderable;

class SystemCollector extends DataCollector implements Renderable {
    protected $useHtmlVarDumper = false;

    public function getName() {
        return 'system';
    }

    public function useHtmlVarDumper($value = true) {
        $this->useHtmlVarDumper = $value;
        return $this;
    }

    public function isHtmlVarDumperUsed() {
        return $this->useHtmlVarDumper;
    }

    public function getAssets() {
        return $this->isHtmlVarDumperUsed() ? $this->getVarDumper()->getAssets() : array();
    }

    public function collect() {
//        $data['* Components'] = '';
//        $data['Field 1'] = $this->getDataFormatter()->formatVar('format text');
//        $data['Field 2'] = $this->isHtmlVarDumperUsed();
//        $data['Field 3'] = phpversion();

        for ($i=1; $i<=20; $i++) {
            $data['Field ' . $i] = phpversion();
        }

        return $data;
    }

    public function getWidgets() {
        return [
            'system' => [
                //'icon' => 'code',
                'tooltip' => 'Data tooltip...',
                'widget' => 'PhpDebugBar.Widgets.VariableListWidget',
                //'widget' => 'PhpDebugBar.Widgets.ListWidget',
                'map' => 'system',
                'default' => '[]'
            ]
        ];
    }
}