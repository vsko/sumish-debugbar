<?php

namespace Sumish\Debugbar;

use \DebugBar\DataCollector\DataCollector as DataCollector;
use \DebugBar\DataCollector\Renderable as Renderable;

class InfoCollector extends DataCollector implements Renderable {
    public function getName() {
        return 'info';
    }

    public function collect() {
        return [
            'bar' => '...',
        ];
    }

    public function getWidgets() {
        return [
            'info' => [
                'icon' => 'info',
                'tooltip' => 'Info tooltip...',
                'map' => "info.bar",
                'default' => ''
            ]
        ];
    }
}